let toggleCount = {};

// When an option is selected, the value of the input is set to the selected option and the dropdown is hidden
function selectOption(e, id) {
    const input = document.getElementById(id);
    input.value = e.textContent.trim();
    const dropdownContent = e.closest('#content-' + id);
    const drop = document.getElementById('drop');
    drop.classList.toggle('rotate-180');
    if (dropdownContent) {
        dropdownContent.classList.toggle('hidden');
    }
    // Set toggleCount to 0 when an option is selected
    toggleCount[id] = 0;
}

// When dropdown click is triggered hidden class is toggled
function toggleDropdown(id) {
    if (!toggleCount[id]) {
        toggleCount[id] = 0;
    }
    const dropdownContent = document.getElementById(id);
    const drop = document.getElementById('drop');
    drop.classList.toggle('rotate-180');
    if (dropdownContent && toggleCount[id] !== 0) {
        dropdownContent.classList.toggle('hidden');
    }
    toggleCount[id]++;
}


document.addEventListener('DOMContentLoaded', function () {
    const inputs = document.querySelectorAll('input, select');
    const submitButton = document.querySelector('button[type="submit"]');

    function checkInputs() {
        let allFilled = true;

        inputs.forEach(input => {
            if (input.type !== 'radio' && !input.value.trim()) {
                allFilled = false;
            } else if (input.type === 'radio' && !document.querySelector(`input[name="${input.name}"]:checked`)) {
                allFilled = false;
            }
        });

        if (allFilled) {
            submitButton.removeAttribute('disabled');
            submitButton.classList.remove('bg-Neutral/30', 'pointer-events-none');
            submitButton.classList.add('bg-Primary/10')
        } else {
            submitButton.setAttribute('disabled', 'disabled');
            submitButton.classList.add('bg-Neutral/30', 'pointer-events-none');
        }
    }

    inputs.forEach(input => {
        input.addEventListener('input', checkInputs);
    });

    // Check inputs initially
    checkInputs();
});
