document.addEventListener('DOMContentLoaded', function() {
    var myModal = new bootstrap.Modal(document.getElementById('characterModal'));
    var modalTitle = document.getElementById('characterModalLabel');
    var modalBody = document.querySelector('.modal-body');

    document.querySelectorAll('.grid-item img').forEach(function(img) {
        img.addEventListener('click', function() {
            var name = img.getAttribute('data-name');
            var imgSrc = img.getAttribute('data-img');

            modalTitle.textContent = name;

            // Send an AJAX request to fetch additional data
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        modalBody.innerHTML = xhr.responseText;
                        myModal.show();
                    } else {
                        console.log("AJAX request failed: Status " + xhr.status);
                        modalBody.innerHTML = "<p>Failed to load character details.</p>";
                        myModal.show();
                    }
                }
            };
            xhr.open('GET', './functions/getCharacterDetails.php?name=' + encodeURIComponent(name), true);
            xhr.send();
        });
    });
});
