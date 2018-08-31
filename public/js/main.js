const departments = document.getElementById('departments');

if (departments) {
    departments.addEventListener('click', e => {
        if (e.target.className === 'btn btn-outline-danger delete-department') {
            if (confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch('/departments/delete/${id}', {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}