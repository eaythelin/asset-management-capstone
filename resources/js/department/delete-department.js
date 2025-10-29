const deleteButtons = document.querySelectorAll('.deleteButton');

deleteButtons.forEach(button => {
  button.addEventListener('click', function() {
    const id = this.dataset.id;
    let route = this.dataset.route;
    route = route.replace(':id', id);
    document.getElementById('deleteForm').action = route;
  });
});