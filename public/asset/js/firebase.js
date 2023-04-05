$(document).ready(function() {

    const firebaseConfig = {
        apiKey: "AIzaSyDvsLdYTpyASMv3eVFcf3g68rDdDAo7pZ4",
        authDomain: "vevuae.firebaseapp.com",
        projectId: "vevuae",
        storageBucket: "vevuae.appspot.com",
        messagingSenderId: "832766811020",
        appId: "1:832766811020:web:672bcf1c4e91c56c3594a9",
        measurementId: "G-0MZVJSE6EJ"
    };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

    var URL = $('meta[name="baseURL"]').attr('content');

    console.log("Firebase started.");

    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        'size': 'invisible',
        'callback': (response) => {
            // reCAPTCHA solved, allow signInWithPhoneNumber.
            // ...
        },
        'expired-callback': () => {
            // Response expired. Ask user to solve reCAPTCHA again.
            // ...
        }
    });

    $("#GetCode").click(function(){
        const phoneNumber = $("[name=phone]").val();
        if(isNaN(phoneNumber)){
            alert("Please enter valid phone number");
            return
        }
        const appVerifier = window.recaptchaVerifier;
        firebase.auth().signInWithPhoneNumber
        (phoneNumber, appVerifier)
            .then((confirmationResult) => {
                window.confirmationResult=confirmationResult;
                coderesult=confirmationResult;

            }).catch((error) => {
            // Error; SMS not sent
            console.log(error.message);
            // ...
        });
    })

    $('#verify_otp').click(function(){
        // const code = $("[name=verifyOtp]").val();
        var code = $('input[name^=verifyOtp]').map(function(idx, elem) {
            return $(elem).val();
        }).get();
        alert(code)
        coderesult.confirm(code).then(function (result) {
            const user = result.user;
            console.log("User signed in successfully")
        }).catch((error) => {
            // User couldn't sign in (bad verification code?)
            console.log(error.message)
        });
    });
});



