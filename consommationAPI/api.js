const body = document.querySelector('.body');
const ID = document.getElementById('input');

const myEditForm = document.getElementById('myeditform');
const idDelete = document.querySelectorAll('#delete');
const id = document.querySelectorAll('#edit');

// let SearchedId = ID.value
window.onload = () => {
    function printData(data) {

        let tr = ``;

        data.forEach(d => {
            tr += `
            <tr>

                <td> ${d.customer_id}  </td>
                <td> ${d.customer_name} </td>
                <td> ${d.customer_email}  </td>
                <td> ${d.customer_contact}  </td>
                <td> ${d.customer_address} </td>
                <td> ${d.country} </td>
                <td id="delete" onclick="getId(${d.customer_id})"> <i class='fa-solid fa-trash'> </i> </td>
                <td id="edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="getidedit(${d.customer_id})"><i class="fa-solid fa-pen-to-square"></i> </td>

                </tr>
            `
        });
        body.innerHTML = tr;
    }
    async function getallcustomer() {

        const response = await fetch("http://localhost/api/public/customers/read")
        const data = await response.json()
        printData(data);
    }

    getallcustomer();

}

function display() {

    function printData(data1) {
        let tr = ``;
        tr += `
                <tr>
                    <td> ${data1[0].customer_id} </td>
                    <td> ${data1[0].customer_name} </td>
                    <td> ${data1[0].customer_email} </td>
                    <td> ${data1[0].customer_contact} </td>
                    <td id="delete" onclick="getId(${d.customer_id})"> <i class='fa-solid fa-trash'> </i> </td>
                    <td id="edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="getidedit(${d.customer_id})"><i class="fa-solid fa-pen-to-square"></i> </td>
                  </tr>
                `

        body.innerHTML = tr;
    }

    async function getonecustomer() {

        let url = `http://localhost/api/public/customers/readone?id=${document.getElementById('input').value}`;
        const response = await fetch(url);
        const data = await response.json()
        console.log(document.getElementById('input').value);

        printData(data);
    }


    getonecustomer()
}







function getId(iddelete) {
    fetch(`http://localhost/api/public/customers/delete/?id=${iddelete}`, {

    }).then(response => response.json())
        .then(form => {
            console.log('Success:', form);
        })
        .catch((error) => {
            console.error('Error:', error);
        });

    location.reload();
};

let user_id = null;

function getidedit(id){
    user_id = id
}


document.querySelector('#my-submit').addEventListener('click',(e)=>{
    // e.preventDefault();
    console.log(user_id);
    const formData = new FormData(myEditForm);
    formData.append('customer_id', user_id);
    // console.log(formData);
    fetch('http://localhost/api/public/customers/edit', {
        method: 'POST',
        body: formData,
    }).then(response => response.json())
        .then(form => {
            console.log('Success:', form);
        })
        .catch((error) => {
            console.error(error);
        });
});