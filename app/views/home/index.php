<?php
require_once dirname(__DIR__) . "./components/header.php";
// var_dump(dirname(__DIR__));
?>

<link rel="stylesheet" href="css/style.css">



<!-- </?php if(isset($_SESSION['ref'])) : ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Succesfully!</strong> <:?php echo $_SESSION['ref'].".";
                 unset($_SESSION['ref']); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
        <:?php endif ; ?> -->


<section class="bg-cover" style="background-image: url(../img/hero.jpg)">
    <div class="container">
        <div class="row min-vh-100 align-content-center justify-content-center">
            <!-- <h1>Welcome To DentLife Your reference is :</h1> -->
            <div class="card align-items-center col-lg-6 col-md-8 col-sm-10 col-11 p-0">
                <div class="card-header text-center bg-primary w-100">
                    <h2 class=" text-white">Appointment</h2>
                </div>
                <div class="card-body w-100">
                    <form action="http://localhost/dentiste/home/create" class="d-flex flex-column" method="POST">
                        <!-- <form action="" class="d-flex flex-column" method="POST"> -->
                        <div class="mb-3 d-flex flex-column">
                            <label class="form-label">Subject</label>
                            <select name="subject_id">
                                <?php foreach ($subjects as $subject) : ?>
                                    <option value="<?= $subject['id'] ?>"><?= $subject['subject'] ?></option>
                                <?php endforeach; ?>
                                <!-- <option value="1">Tooth Pain</option>
                                <option value="2">Periodontal Disease</option>
                                <option value="3">Uneven Teeth</option>
                                <option value="4">Cavities & Decay</option> -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input  id="date" type="date" name="date" class="form-control" min="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label class="form-label">Time</label>
                            <select name="timeslot_id" id="timeslot">
                                <!-- </?php foreach ($timeslots as $timeslot) : ?>
                                    <option value="</?= $timeslot['id'] ?>"></?= $timeslot['time'] ?></option>
                                </?php endforeach; ?> -->
                                <!-- <option value="1">10:00</option>
                                <option value="2">10:30</option>
                                <option value="3">11:00</option>
                                <option value="4">14:00</option>
                                <option value="5">14:30</option>
                                <option value="6">15:00</option> -->
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary align-self-center">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container table-responsive">
        
        <table class=" table">
            <thead>
                <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody id="appointment">
                <!-- <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr> -->
            </tbody>
        </table>
        <!-- <div id="appointment">
            
        </div> -->
    </div>
</section>


<div class=" text-end container mt-3 mb-3">
  
  
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    See Your reference
  </button>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <?php $ref = currentUserRef() ?>
        Your reference is : <?= $ref ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<!-- <:?php
echo currentUserRef();
?>
<:?php  
$ref = currentUserRef();
echo '<script>';
echo ' alert("Your reference is' ;
echo $ref ;
echo ')';
echo '</script>';
?> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="js/home.js"></script>
<script>

 const dt = document.getElementById("date");
 dt.addEventListener('change' , function(){
    handleDate()
 })
async function handleDate() {

let inputDate = document.getElementById("date").value;
  try {

    let inputTime = document.getElementById("timeslot");
    inputTime.innerHTML="";
    let optionS = document.createElement('option');
    optionS.textContent ='select time'
    optionS.setAttribute('selected' , '')
    optionS.setAttribute('disabled' , '')
    optionS.value = "";
    inputTime.append(optionS);


    for(let i=1 ; i<7 ; i++)
    {
      let formdata = new FormData();
      formdata.append("date", inputDate );
      formdata.append("id_time", i );
    //   ---------------------

    // const response = fetch("http://localhost/dentiste/home/getTimes",
    //     {
    //         headers: {
    //         'Accept': 'application/json',
    //         'Content-Type': 'application/json'
    //         },
    //         method: "POST",
    //         body: formdata
    //     })

    // -----------------------
      const response = await axios.post(
        "http://localhost/dentiste/home/getTimes",
        formdata
      );
      const data = await response.data;
      console.log(data)
      if (data) {
        if(data['rows']==0)
        {
          let option = document.createElement('option');
          option.textContent = data['time']['time']
          option.value = i;
          inputTime.append(option);
        }

      }
    } 

  } catch (error) {
    console.log(error);
  }

}


</script>


<?php
require_once dirname(__DIR__) . "./components/footer.php";
?>