const editButtons = document.querySelectorAll('.editButton');

editButtons.forEach(button => {
  button.addEventListener('click', function() {
    const name = this.dataset.name;
    const description = this.dataset.description;
    let route = this.dataset.route;
    
    const form = document.getElementById('editForm');
    form.action = route;
    
    form.querySelector('#edit_department_name').value = name;
    form.querySelector('#edit_description').value = description;
  });
});