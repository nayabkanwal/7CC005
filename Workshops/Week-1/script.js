let items = [];
let filter = 'all';

// Function to load items from the server
function loadItems() {
    fetch('todo.php')
        .then(response => response.json())
        .then(data => {
            items = data;
            updateList(); 
        })
        .catch(error => console.error('Error:', error));
}

// Function to add an item to the list
function addItem() {
    const input = document.getElementById('new-item');
    if (input.value.trim() !== '') {
        fetch('todo.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ text: input.value })
        })
            .then(response => response.json())
            .then(data => {
                items = data;
                updateList();
            })
            .catch(error => console.error('Error:', error));

        input.value = '';
    }
}

// Function to toggle completion status of an item
function toggleCompletion(index) {
    items[index].completed = !items[index].completed;
    updateList(); 
}

// Function to update the list display based on the current items and filter
function updateList() {
    const list = document.getElementById('items-list');
    list.innerHTML = '';
    items.forEach((item, index) => {
        if (filter === 'all' || (filter === 'completed' && item.completed) || (filter === 'active' && !item.completed)) {
            const itemElement = document.createElement('li');
            itemElement.textContent = item.text;
            itemElement.style.textDecoration = item.completed ? 'line-through' : 'none';
            itemElement.onclick = () => toggleCompletion(index);
            list.appendChild(itemElement);
        }
    });
}

// Function to change the current filter and update the list accordingly
function filterList(mode) {
    filter = mode;
    updateList(); 
}

// Load items when the document is ready
document.addEventListener('DOMContentLoaded', loadItems);
