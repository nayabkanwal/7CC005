let items = [];
let filter = 'all';

function addItem() {
    const input = document.getElementById('new-item');
    if (input.value.trim() !== '') {
        items.push({ text: input.value, completed: false });
        input.value = '';
        updateList();
    }
}

function toggleCompletion(index) {
    items[index].completed = !items[index].completed;
    updateList();
}

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

function filterList(mode) {
    filter = mode;
    updateList();
}
