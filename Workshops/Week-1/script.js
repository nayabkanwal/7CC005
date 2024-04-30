let items = [];

function loadItems() {
    fetch('todo.php')
        .then(response => response.json())
        .then(data => {
            items = data;
            updateList();
        })
        .catch(error => console.error('Error:', error));
}

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

function toggleCompletion(index) {
    items[index].completed = !items[index].completed;
    updateList();
}

document.addEventListener('DOMContentLoaded', loadItems);
