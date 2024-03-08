<script>
  const relocateButtons = document.querySelectorAll('.relocate')
  console.log(relocateButtons)
  relocateButtons.forEach(button => {
    button.style.cursor = 'pointer'
    button.addEventListener('click', () => {
      const form = document.querySelectorAll('form')
      console.log(form)
      form.forEach(element => {
        element.classList.toggle('wrap')
      })
      const overlay = document.querySelector('.overlay');
      overlay.style.display = overlay.style.display === 'none' ? 'block' : 'none';
    })
  })
</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-DhY6onE6oOQKv3ufi6F5O6f3FVyl6DYYfB+0a4Htx0Og3p9I+AV2wA1gDS6S6Qrw" crossorigin="anonymous">
</script>
</body>

</html>