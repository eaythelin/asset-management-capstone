const editButtons = document.querySelectorAll('.editButton');

editButtons.forEach(button => {
  button.addEventListener('click', function() {
    const firstname = this.dataset.firstName;
    const lastname = this.dataset.lastName;
    const department = this.dataset.department;
    let route = this.dataset.route;
    
    const form = document.getElementById('editForm');
    form.action = route;
    
    form.querySelector('#edit_first_name').value = firstname;
    form.querySelector('#edit_last_name').value = lastname;

    const select = document.getElementById('edit_selectDepartment');
    select.value = department;
  });
});