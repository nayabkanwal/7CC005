# Simple To-Do List Application with PHP and JavaScript Integration

This document explains the integration of JavaScript and PHP in a simple to-do list application. The application allows users to add tasks, mark them as completed, and filter the list based on the task status. The data is stored in the server session, allowing persistence across page reloads.

## PHP Backend (todo.php)

The PHP script handles storing and retrieving tasks using session storage. It supports two HTTP methods:

- **GET**: Fetches and returns the list of tasks from the session.
- **POST**: Adds a new task to the session and returns the updated list.

The tasks are stored in an associative array with each task having a 'text' and a 'completed' status.

## JavaScript Integration (script.js)

### Key Functions:

- **loadItems()**: Fetches the current list of tasks from the server using a GET request and updates the UI.
- **addItem()**: Sends a new task to the server using a POST request and updates the UI with the returned list.
- **toggleCompletion()**: Toggles the completion status of a task. This change is handled locally and reflected immediately in the UI.
- **updateList()**: Updates the HTML list based on the tasks array and current filter setting.
- **filterList()**: Sets the filter for displaying tasks and updates the list accordingly.

### Event Handling and DOM Manipulation:

- Tasks can be added by interacting with the input field and add button.
- The completion status of tasks can be toggled by clicking on the task in the list.
- Filters can be applied to view all tasks, only completed, or active tasks using the filter buttons.

## Summary

This application demonstrates a simple but effective use of PHP and JavaScript to manage a to-do list with session-based persistence and dynamic client-side interactions. It showcases fundamental concepts such as AJAX requests, session management, and DOM manipulation.
