document.addEventListener("DOMContentLoaded", function() {
    const taskList = document.getElementById('task-list');
    
    taskList.addEventListener('change', function(event) {
        if (event.target.type === 'checkbox') {
            const taskId = event.target.dataset.taskId;
            const completed = event.target.checked ? 1 : 0;
            
            fetch(`update_task.php?id=${taskId}&completed=${completed}`, {
                method: 'POST'
            }).then(response => {
                if (!response.ok) {
                    throw new Error('Failed to update task');
                }
            }).catch(error => {
                console.error(error);
            });
        }
    });

    taskList.addEventListener('click', function(event) {
        if (event.target.classList.contains('del-btn')) {
            const taskId = event.target.dataset.taskId;
            
            fetch(`delete_task.php?id=${taskId}`, {
                method: 'DELETE'
            }).then(response => {
                if (!response.ok) {
                    throw new Error('Failed to delete task');
                }
                // Refresh the task list after deletion
                window.location.reload();
            }).catch(error => {
                console.error(error);
            });
        }
    });
});
