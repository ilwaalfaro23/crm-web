<html>
    <body>
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
const avatarBtn = document.getElementById('avatarBtn');
const dropdown = document.getElementById('avatarDropdown');

avatarBtn.addEventListener('click', function (e) {
  e.stopPropagation();
  dropdown.classList.toggle('show');
});

document.addEventListener('click', function () {
  dropdown.classList.remove('show');
});
</script>

</body>
</html>
