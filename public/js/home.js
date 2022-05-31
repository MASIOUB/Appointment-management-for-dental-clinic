
// async function get(){
//     const res = await fetch("http://localhost/dentiste/app/controllers/ApiController.php")
//     const data = await res.json()
//     console.log(data)

// console.log("hello")

// let appointmentList = document.querySelector("#appointment");
// appointmentList.innerHTML = data;
// }

// get()

fetch("http://localhost/dentiste/home/history")
    .then(response => response.json())
    .then((data) => {
        // console.log(data)
        // console.log(data[0].id);
        const appointmentList = document.querySelector("#appointment");
        for (const rdv in data) {
            const appointment = document.createElement('tr');
            appointmentList.appendChild(appointment);
            const action = document.createElement('td');
            const cancel = document.createElement('button');
            const edit = document.createElement('button');
            cancel.classList.add("btn-cancel");
            edit.classList.add("btn-edit");
            appointment.appendChild(action);
            action.appendChild(cancel);
            action.appendChild(edit);
            const cancelLink = document.createElement('a');
            const editLink = document.createElement('a');
            cancel.appendChild(cancelLink);
            edit.appendChild(editLink);
            cancelLink.href = "http://localhost/dentiste/home/delete/" + data[rdv].id;
            editLink.href = "http://localhost/dentiste/home/update/" + data[rdv].id;
            cancelLink.innerHTML = `<i class='fas fa-trash text-white'></i>`;
            editLink.innerHTML = `<i class='fas fa-pen-to-square text-white'></i>`;
            const subject = document.createElement('td');
            subject.innerHTML += data[rdv].subject;
            appointment.appendChild(subject);
            const date = document.createElement('td');
            date.innerHTML += data[rdv].date;
            appointment.appendChild(date);
            const time = document.createElement('td');
            time.innerHTML += data[rdv].time;
            appointment.appendChild(time);
        }
    })

// fetch("http://localhost/dentiste/home/allAppointments")
//     .then(response => response.json())
//     .then((data) => {
//         console.log(data)
        // const timeslot = document.querySelector('#timeslot');
        // const date = document.querySelector('#date');
        // date.addEventListener('change', displayExistTimeslots);

        // function displayExistTimeslots(e){
        //     let dateCase = 0;
        //     for (const rdv in data)
        //     {

        //     }
        // let time = 0;
        // </?php foreach ($timeslots as $timeslot) : ?>
        // </?php foreach ($appointments as $appointment) : ?>
        // if ($timeslot['id] == $appointment['timeslot_id'])
        // time = 1;
        // endif;
        // endforeach;

    // })

