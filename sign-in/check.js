const checkbox = document.getElementById('myCheckbox')

checkbox.addEventListener('change', (event) => {
  if (event.currentTarget.checked) {
    window.location = 'novo_user';
  } else {
    window.location = 'logar';
  }
})