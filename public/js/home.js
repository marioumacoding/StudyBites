document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('bg-toggle-btn');
    const panel = document.getElementById('bg-selector');
    const container = document.getElementById('study-container');
    const quoteContainer = document.getElementById('quote-container');
    // let currentQuoteIndex = 0;
    // let intervalId;


    // ---------------- Load a random quote ----------------
    function loadQuote() {
        const quotes = [
            {
                content: "The only way to do great work is to love what you do.",
                author: "Steve Jobs"
            },
            {
                content: "Success is not final, failure is not fatal: It is the courage to continue that counts.",
                author: "Winston Churchill"
            },
            {
                content: "Believe you can and you're halfway there.",
                author: "Theodore Roosevelt"
            },
            {
                content: "What lies behind us and what lies before us are tiny matters compared to what lies within us.",
                author: "Ralph Waldo Emerson"
            },
            {
                content: "The best way to predict the future is to invent it.",
                author: "Alan Kay"
            }
        ];
    
        const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];
    
        const quoteContainer = document.getElementById('quote-container');
        if (quoteContainer) {
            quoteContainer.innerHTML = `
                <blockquote style="font-style: italic;">"${randomQuote.content}"</blockquote>
                <p style="margin-top: 10px; text-align: right;">— ${randomQuote.author}</p>
            `;
        }
    }
    
    // ---------------- Run when page loads ----------------
    window.addEventListener('load', function() {
        loadQuote();
    });
    

    if (btn && panel && container) {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            panel.style.display = panel.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function() {
            panel.style.display = 'none';
        });

        panel.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        document.querySelectorAll('.bg-option').forEach(option => {
            option.addEventListener('click', function() {
                const bgUrl = this.dataset.bg;
                container.style.backgroundImage = `url('${bgUrl}')`;

                fetch('/update-background', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ background: bgUrl })
                });
            });
        });
    } else {
        console.error("Missing elements (button, panel, or container)!");
    }

    window.addEventListener('beforeunload', function() {
        if (intervalId) {
            clearInterval(intervalId);
        }
    });
});

let timerInterval;
let isRunning = false;
let timeLeft = 0.5 * 60; // 30 seconds for testing
let sessionType = 'focus'; // 'focus', 'shortBreak', 'longBreak'

// Format time as MM:SS
function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    return `${minutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
}

// // Start/Pause Timer
// function startPauseTimer() {
//     if (isRunning) {
//         clearInterval(timerInterval);
//         document.getElementById("start-stop").innerText = "Start";
//     } else {
//         timerInterval = setInterval(() => {
//             timeLeft--;
//             document.getElementById("timer").innerText = formatTime(timeLeft);

//             if (timeLeft <= 0) {
//                 clearInterval(timerInterval);
//                 document.getElementById("start-stop").innerText = "Start";
//                 new Audio('/sounds/session-completed.wav').play();
//                 alert(sessionType.charAt(0).toUpperCase() + sessionType.slice(1) + " session complete!");

//                 if (sessionType === 'focus') {
//                     fetch('/complete-session', {
//                         method: 'POST',
//                         headers: {
//                             'Content-Type': 'application/json',
//                             'X-CSRF-TOKEN': '{{ csrf_token() }}'
//                         },
//                         body: JSON.stringify({})
//                     })
//                     .then(response => response.json())
//                     .then(data => {
//                         if (data.success) {
//                             alert('🎉 Points updated! Total: ' + data.points);
//                         }
//                     });
//                 }
//             }
//         }, 1000);
//         document.getElementById("start-stop").innerText = "Pause";
//     }
//     isRunning = !isRunning;
// }

// Reset Timer
function resetTimer() {
    clearInterval(timerInterval);
    setTimer(sessionType);
    document.getElementById("start-stop").innerText = "Start";
    isRunning = false;
}

// Set Timer
function setTimer(type) {
    sessionType = type;
    switch (type) {
        case 'focus':
            timeLeft = 0.5 * 60;
            break;
        case 'shortBreak':
            timeLeft = 5 * 60;
            break;
        case 'longBreak':
            timeLeft = 15 * 60;
            break;
    }
    document.getElementById("timer").innerText = formatTime(timeLeft);
    if (isRunning) {
        startPauseTimer(); // pause if already running
    }
}


// document.addEventListener('DOMContentLoaded', function() {
//     const toggleTaskListBtn = document.getElementById('toggleTaskListBtn');
//     const taskListContainer = document.getElementById('taskListContainer');
//     const taskList = document.getElementById('taskList');
//     const newTaskInput = document.getElementById('newTaskInput');
//     const addTaskBtn = document.getElementById('addTaskBtn');

//     // Toggle task list visibility
//     toggleTaskListBtn.addEventListener('click', function() {
//         taskListContainer.style.display = (taskListContainer.style.display === 'none' || taskListContainer.style.display === '') ? 'block' : 'none';
//     });

//     // Add a new task
//     addTaskBtn.addEventListener('click', function() {
//         const taskText = newTaskInput.value.trim();
//         if (taskText !== '') {
//             addTask(taskText);
//             newTaskInput.value = '';
//         }
//     });

//     // Add task on pressing Enter
//     newTaskInput.addEventListener('keydown', function(e) {
//         if (e.key === 'Enter') {
//             addTaskBtn.click();
//         }
//     });

//     // Function to create a task item
//     function addTask(taskText) {
//         const listItem = document.createElement('li');
//         listItem.classList.add('d-flex', 'align-items-center', 'mb-2', 'task-item');

//         const taskSpan = document.createElement('span');
//         taskSpan.textContent = taskText;
//         taskSpan.classList.add('flex-grow-1');
//         taskSpan.style.cursor = 'pointer';
//        // Check (✔️) button
//        const checkBtn = document.createElement('span');
//         checkBtn.innerHTML = '&#10003;'; // ✔️ character
//         checkBtn.style.cursor = 'pointer';
//         checkBtn.style.color = 'green';
//         checkBtn.style.marginRight = '10px';
//         checkBtn.addEventListener('click', function(e) {
//             e.stopPropagation();
//             taskSpan.style.textDecoration = taskSpan.style.textDecoration === 'line-through' ? 'none' : 'line-through';
//         });
//         const editBtn = document.createElement('span');
//         editBtn.innerHTML = '&#9998;'; // ✎ edit icon
//         editBtn.classList.add('ml-2', 'text-primary');
//         editBtn.style.cursor = 'pointer';
//         editBtn.style.marginLeft = '10px';
//         editBtn.addEventListener('click', function(e) {
//             e.stopPropagation();
//             const newTaskName = prompt('Edit task:', taskSpan.textContent);
//             if (newTaskName !== null && newTaskName.trim() !== '') {
//                 taskSpan.textContent = newTaskName.trim();
//             }
//         });

//         const deleteBtn = document.createElement('span');
//         deleteBtn.innerHTML = '&times;'; // × close icon
//         deleteBtn.classList.add('ml-2', 'text-danger');
//         deleteBtn.style.cursor = 'pointer';
//         deleteBtn.style.marginLeft = '10px';
//         deleteBtn.addEventListener('click', function(e) {
//             e.stopPropagation();
//             listItem.remove();
//         });

//         listItem.appendChild(checkBtn);
//         listItem.appendChild(taskSpan);
//         listItem.appendChild(editBtn);
//         listItem.appendChild(deleteBtn);


//         listItem.addEventListener('click', function() {
//             taskSpan.classList.toggle('text-decoration-line-through');
//             taskSpan.classList.toggle('text-muted');
//         });

//         taskList.appendChild(listItem);
//     }
// });

function toggleList() {
    const todoContainer = document.getElementById('todoContainer');
    todoContainer.style.display = todoContainer.style.display === 'none' ? 'block' : 'none';
}

function toggleHistory() {
    const historyContainer = document.getElementById('historyContainer');
    
    if (historyContainer.style.display === 'none') {
        // Show loading indicator
        historyContainer.innerHTML = '<p>Loading history...</p>';
        historyContainer.style.display = 'block';
        
        // Fetch history via AJAX
        fetch('/todos/history')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(html => {
                historyContainer.innerHTML = html;
            })
            .catch(error => {
                console.error('Error loading history:', error);
                historyContainer.innerHTML = '<p>Error loading history. Please try again.</p>';
            });
    } else {
        historyContainer.style.display = 'none';
    }
}

// Function to add a task to the list
function addTask() {
    const taskInput = document.getElementById('taskInput');
    const task = taskInput.value;

    // Ensure the task is not empty
    if (task.trim() === '') {
        alert('Please enter a task.');
        return;
    }

    // Send the task to the server using fetch (AJAX)
    fetch('/todos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ description: task })
    })
    .then(response => response.json())
    .then(data => {
        // Dynamically add the task to the list
        const todoList = document.getElementById('todoList');
        const li = document.createElement('li');
        li.textContent = data.description;
        todoList.appendChild(li);

        // Clear the input field after adding the task
        taskInput.value = '';
    })
    .catch(error => console.error('Error adding task:', error));
}


   // Todo List Functionality
document.addEventListener('DOMContentLoaded', function() {
    const todoContainer = document.getElementById('todoContainer');
    const todoList = document.getElementById('todoList');
    const historyContainer = document.getElementById('historyContainer');
    const historyList = document.getElementById('historyList');

    // Create input field and add button
    const inputContainer = document.createElement('div');
    inputContainer.style.display = 'flex';
    inputContainer.style.marginBottom = '10px';

    const input = document.createElement('input');
    input.type = 'text';
    input.id = 'taskInput';
    input.placeholder = 'New task...';
    input.style.flex = '1';
    input.style.padding = '5px';

    const addButton = document.createElement('button');
    addButton.textContent = 'Add';
    addButton.style.marginLeft = '5px';
    addButton.style.padding = '5px';
    addButton.style.backgroundColor = '#F08080';
    addButton.style.color = 'white';
    addButton.style.border = 'none';
    addButton.style.borderRadius = '5px';
    addButton.style.cursor = 'pointer';
    addButton.onclick = addTask;

    inputContainer.appendChild(input);
    inputContainer.appendChild(addButton);
    todoContainer.insertBefore(inputContainer, todoList);

    // Load todos from server
    loadTodos();

    // Function to load todos
    function loadTodos() {
        fetch('/todos')
            .then(response => response.json())
            .then(todos => {
                todoList.innerHTML = '';
                todos.forEach(todo => {
                    const li = createTodoItem(todo);
                    todoList.appendChild(li);
                });
            });
    }

    // Function to create a todo item
    // Function to create a todo item
function createTodoItem(todo) {
    const li = document.createElement('li');
    li.className = 'todo-item';
    li.dataset.id = todo.id;
    li.style.display = 'flex';
    li.style.alignItems = 'center';
    li.style.justifyContent = 'space-between';
    li.style.padding = '8px';

    const leftSide = document.createElement('div');
    leftSide.style.display = 'flex';
    leftSide.style.alignItems = 'center';
    leftSide.style.flex = '1';

    // Checkbox
    const checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.style.marginRight = '10px';
    checkbox.checked = todo.completed;
    checkbox.onchange = function() {
        // Send the updated completed status (true or false) along with the description
        updateTodo(todo.id, {
            description: todo.description,  // Keep the same description
            completed: this.checked ? 1 : 0  // Send 1 for checked, 0 for unchecked
        });
    };
    

    // Task text
    const span = document.createElement('span');
    span.textContent = todo.description;
    span.style.flex = '1';
    span.style.cursor = 'pointer';
    span.style.textDecoration = todo.completed ? 'line-through' : 'none';
    span.style.color = todo.completed ? 'gray' : 'black';

    // Delete button
    const deleteBtn = document.createElement('button');
    deleteBtn.textContent = '✕';
    deleteBtn.style.background = 'transparent';
    deleteBtn.style.border = 'none';
    deleteBtn.style.color = '#ff5555';
    deleteBtn.style.fontSize = '18px';
    deleteBtn.style.cursor = 'pointer';
    deleteBtn.onclick = function() {
        deleteTodo(todo.id);
    };

    // Edit button
    const editBtn = document.createElement('span');
    editBtn.innerHTML = '&#9998;'; // ✎ edit icon
    editBtn.classList.add('ml-2', 'text-primary');
    editBtn.style.cursor = 'pointer';
    editBtn.style.marginLeft = '10px';
    editBtn.addEventListener('click', function(e) {
        e.stopPropagation(); // Prevent triggering the span click

        // Prompt user to edit task description
        const newTaskName = prompt('Edit task:', todo.description);
        if (newTaskName !== null && newTaskName.trim() !== '') {
            // Update the task on the frontend
            span.textContent = newTaskName.trim();

            // Update the task in the database
            updateTodo(todo.id, { description: newTaskName.trim() });
        }
    });

    leftSide.appendChild(checkbox);
    leftSide.appendChild(span);
    li.appendChild(leftSide);
    li.appendChild(editBtn);
    li.appendChild(deleteBtn);

    return li;
}

function updateTodo(id, data) {
    fetch(`/todos/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(updatedTodo => {
        console.log('Updated todo:', updatedTodo);
        const li = document.querySelector(`.todo-item[data-id="${id}"]`);
        if (li) {
            const span = li.querySelector('span');
            span.style.textDecoration = updatedTodo.completed ? 'line-through' : 'none';
            span.style.color = updatedTodo.completed ? 'gray' : 'black';
        }
    })
    .catch(error => console.error('Error updating task:', error));
}


    // Function to delete a todo
    function deleteTodo(id) {
        if (!confirm('Are you sure you want to delete this task?')) return;

        fetch(`/todos/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(() => {
            const li = document.querySelector(`.todo-item[data-id="${id}"]`);
            if (li) li.remove();
        })
        .catch(error => console.error('Error deleting task:', error));
    }

    // Function to toggle history
    function toggleHistory() {
        if (historyContainer.style.display === 'none') {
            fetch('/todos/history')
                .then(response => response.text())
                .then(html => {
                    historyContainer.innerHTML = html;
                    historyContainer.style.display = 'block';
                });
        } else {
            historyContainer.style.display = 'none';
        }
    }

    // Make the input respond to Enter key
    input.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            addTask();
        }
    });
});

// Toggle functions
function toggleList() {
    const todoContainer = document.getElementById('todoContainer');
    todoContainer.style.display = todoContainer.style.display === 'none' ? 'block' : 'none';
}

function toggleHistory() {
    const historyContainer = document.getElementById('historyContainer');
    historyContainer.style.display = historyContainer.style.display === 'none' ? 'block' : 'none';
}