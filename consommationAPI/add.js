const myform = document.getElementById('myform');
myform.addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(myform);
    // console.log(formData);

    fetch('http://localhost/api/public/customers/create', {
        method: 'POST',
        body: formData,
    }).then(response => response.json())
        .then(form => {
            console.log('Success:', form);
        })
        .catch((error) => {
            console.error('Error:', error);
        });

});