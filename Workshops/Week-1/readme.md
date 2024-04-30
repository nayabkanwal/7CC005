# Simple To-Do List Application Explanation

This document explains the JavaScript code used in a simple to-do list application. The application allows users to add tasks, mark them as completed, and filter the list based on the task status.

## JavaScript Functions

### `addItem()`

This function is triggered when the user clicks the "Add Item" button. It reads the value from the text input (`new-item`), adds a new item to the `items` array if the input is not empty, clears the input field, and updates the list display.

**Key Concepts:**
- **DOM Manipulation:** Accessing and modifying HTML elements using `document.getElementById()` and modifying `input.value`.
- **Array Operations:** Adding an object to an array with `push()`.

### `toggleCompletion(index)`

This function is called when a user clicks on an item in the list. It toggles the `completed` status of the item at the specified index and updates the list display.

**Key Concepts:**
- **Event Handling:** Using an `onclick` event to run a function.
- **State Management:** Modifying the state of an item in the array.

### `updateList()`

This function re-renders the list based on the `items` array and the current `filter`. It first clears the current list, then iterates over the `items` array, and adds each item to the list if it matches the current filter.

**Key Concepts:**
- **Conditional Rendering:** Using conditions to decide which items to display.
- **DOM Manipulation:** Creating and modifying HTML elements dynamically with `document.createElement()` and `appendChild()`.

### `filterList(mode)`

Called when a user clicks one of the filter buttons ("Show All", "Show Completed", "Show Active"). It sets the `filter` state and updates the list based on this filter.

**Key Concepts:**
- **Event Handling and State Management:** Setting a state based on user interaction and using it to influence app behavior.

## Summary

This JavaScript code demonstrates fundamental concepts such as event handling, DOM manipulation, and state management in a simple web application. It shows how to interact with the DOM to read user input, respond to user actions, and update the UI accordingly.
