
document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', function (event) {
            const inputs = form.querySelectorAll('input, textarea');

            inputs.forEach(input => {
                if (!input.value) {
                    alert(`${input.name} is required!`);
                    event.preventDefault();
                }
            });
        });
    });
});
