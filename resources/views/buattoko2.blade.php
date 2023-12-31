<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    {{-- <link rel="stylesheet" href="resources\css\nj-timepick.css">
    <link rel="stylesheet" href="resources\css\style.css">
    <script src="resources\js\index.js"></script>
    <script src="/path/to/cdn/jquery.min.js"></script>
    <script src="resources\js\time-picker.js"></script> --}}
    {{-- <link rel="stylesheet" href="resources\css\buattoko2.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html,
        body {
            display: grid;
            height: 100%;
            place-items: center;
            text-align: center;
        }

        .container {
            height: 350px;
            width: 430px;
            position: relative;
        }

        .container .wrapper {
            position: relative;
            height: 300px;
            width: 100%;
            border-radius: 10px;
            background: #fff;
            border: 2px dashed #c2cdda;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            top:-50%;
        }

        .wrapper.active {
            border: none;
        }

        .wrapper .image {
            position: absolute;
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wrapper img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .wrapper .icon {
            font-size: 100px;
            color: #93622a;
        }

        .wrapper .text {
            font-size: 20px;
            font-weight: 500;
            color: #5B5B7B;
        }

        .wrapper #cancel-btn i {
            position: absolute;
            font-size: 20px;
            right: 15px;
            top: 15px;
            color: #968b19;
            cursor: pointer;
            display: none;
        }

        .wrapper.active:hover #cancel-btn i {
            display: block;
        }

        .wrapper #cancel-btn i:hover {
            color: #e74c3c;
        }

        .wrapper .file-name {
            position: absolute;
            bottom: 0px;
            width: 100%;
            padding: 8px 0;
            font-size: 18px;
            color: #fff;
            display: none;
            background: linear-gradient(135deg, #DC9966 0%, #7D5243 100%);
        }

        .wrapper.active:hover .file-name {
            display: block;
        }

        .container #custom-btn {
            margin-top: -150px;
            display: block;
            width: 100%;
            height: 50px;
            border: none;
            outline: none;
            border-radius: 25px;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            background: linear-gradient(135deg, #DC9966 0%, #7D5243 100%);
        }
        .nj-timepick{
            position:fixed;
            right:-100%;
            top:0;
            bottom: 0;
            width: 100%;
            z-index: 5000;
            transition: right 0.7s ease;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items:center;
            background-color:rgba(rgb(255, 255, 255), rgb(255, 255, 255), rgb(46, 13, 13), alpha)
        }
        button {
            font-family: "Segoe UI", "Frutiger", "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
            font-weight: bold;
            display: block;
            align-items: center;
            width: 260px;
            height: 36px;
            border-radius: 30px;
            color: #ffffff;
            font-size: 15px;
            cursor: pointer;
        }
        .create{
            margin-top: 80px;
            margin-bottom: 50px;
            margin-left: 80px;
            margin-right: 100px;
            background-color: #7D5243
        }
        .create:hover{
            background-color: #DC9966;
        }
    </style>

    {{-- <div class="container">

        <div class="wrapper">
            <div class="image">
            <img alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <i class="fas fa-cloud-upload-alt"></i>
                </div>
                <div class="text">
                    No file chosen, yet!

                </div>
            </div>
            <div id="cancel-btn">
                <i class="fas fa-times"></i>
            </div>
            <div class="file-name">
                File name here
            </div>

        </div>
        <button onclick="defaultBtnActive()" id="custom-btn">Choose a file</button>
        <input  id="default-btn" type="file" hidden> <br> --}}
        <div class="form-group">
                <form action="{{route('buattoko2post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="fotoToko" id="fotoToko" required>
    <br>
    <img id="image-preview" src="#" alt="Image Preview" style="display: none; max-width: 200px; max-height: 200px; margin-left:auto; margin-right:auto; width:100%;">
    <br>

                       {{-- <button id="custom-btn">Choose a file</button>
                       <input id="default-btn" type="file" name="image" hidden> <br> --}}
<input name="pasar_id" id="pasar_id" type="hidden" value="1">
<input name="akun_id" id="akun_id" type="hidden" value="1" >

                       <input type="text" name="namaToko" placeholder="Nama Toko" /> <br/>
                       <input type="text" name="kotaToko" placeholder="Kota Toko"/><br/>
                       <input type="text" name="lokasiToko" placeholder="Lokasi Toko"/><br/>
                           <div class="jam-operasional">
                               <span>Buka Toko
                                   <input type="time" name="jamoperasiToko">
                               </span>
                           </div>
                           <button type="submit" class="create" >Simpan Toko</button>
                    </div>

            </form>
        </div>
    </div>
    <script>
        // Get the file input element
        const fileInput = document.getElementById('fotoToko');
        // Get the image preview element
        const imagePreview = document.getElementById('image-preview');

        // Add an event listener to the file input
        fileInput.addEventListener('change', function(event) {
            // Get the selected file
            const file = event.target.files[0];

            // Check if a file is selected
            if (file) {
                // Create a FileReader object
                const reader = new FileReader();

                // Set up the FileReader onload event
                reader.onload = function(e) {
                    // Update the image preview source with the selected image
                    imagePreview.src = e.target.result;
                    // Display the image preview
                    imagePreview.style.display = 'block';
                }

                // Read the selected file as a data URL
                reader.readAsDataURL(file);
            } else {
                // No file selected, hide the image preview
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        });
    </script>
    {{-- <script>
        const wrapper = document.querySelector(".wrapper");
        const fileName = document.querySelector(".file-name");
        const defaultBtn = document.querySelector("#default-btn");
        const customBtn = document.querySelector("#custom-btn");
        const cancelBtn = document.querySelector("#cancel-btn i");
        const img = document.querySelector("img");
        let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

        function defaultBtnActive() {
           defaultBtn.click();
        }
        customBtn.addEventListener("click", function() {
   defaultBtn.click();
});

        defaultBtn.addEventListener("change", function() {
           const file = this.files[0];
           if (file) {
              const reader = new FileReader();
              reader.onload = function() {
                 const result = reader.result;
                 img.src = result;
                 wrapper.classList.add("active");
              }
              cancelBtn.addEventListener("click", function() {
                 img.src = "";
                 wrapper.classList.remove("active");
              })
              reader.readAsDataURL(file);
           }
           if (this.value) {
              let valueStore = this.value.match(regExp);
              fileName.textContent = valueStore;
           }
        });

        document.querySelector('form').addEventListener('submit', function(event) {
           event.preventDefault(); // Prevent the form from submitting immediately

           // Access the form data and perform any necessary actions
           const formData = new FormData(this);
           // ... Perform additional actions if needed

           // Submit the form data
           fetch(this.action, {
              method: this.method,
              body: formData
           })
           .then(response => {
              // Handle the response from the server if needed
           })
           .catch(error => {
              // Handle any errors that occur during form submission
           });
        });
        // var myDrop = new drop({
        //     selector: '#myMulti'
        // });
        // var myDrop =new drop({
        //   selector: '#myMulti'
        //     preselected: [0, 2]
        // });
    </script> --}}
</body>

</html>
