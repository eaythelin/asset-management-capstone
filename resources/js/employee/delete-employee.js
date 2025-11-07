const deleteButtons = document.querySelectorAll('.deleteButton');

deleteButtons.forEach(button => {
  button.addEventListener('click', function() {
    const route = this.dataset.route;
    const hasUser = this.dataset.hasUser == 1;

    const text = document.querySelector('.deleteText');

    text.textContent = hasUser 
      ? "This employee has an existing user account. Are you sure you want to delete this?" 
      : "This will permanently delete the employee!";

    document.getElementById('deleteForm').action = route;
  });
});