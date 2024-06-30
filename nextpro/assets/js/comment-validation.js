jQuery(document).ready(function ($) {
    $('#commentform').validate({
        rules: {
            comment: {
                required: true,
            },
            author: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            comment: '<span class="text-danger">Please enter your comment</span>',
            author: '<span class="text-danger">Please enter your name</span>',
            email: '<span class="text-danger">Please enter a valid email address</span>',
        },
        errorPlacement: function (error, element) {
            // Insert error message with HTML
            error.insertAfter(element);
        },
        submitHandler: function (form) {
            // Comment form submission logic (if needed)
            form.submit();
        },
    });
});

// jQuery(document).ready(function ($) {
//     $('#commentform').validate({
//         rules: {
//             comment: {
//                 required: true,
//             },
//             author: {
//                 required: true,
//             },
//             email: {
//                 required: true,
//                 email: true,
//             },
//         },
//         messages: {
//             comment: 'Please enter your comment dsgrdgd',
//             author: 'Please enter your name srgreg',
//             email: 'Please enter a valid email address erreyr',
//         },
//         errorPlacement: function (error, element) {
//             // Wrap error message in a span tag
//             var errorMessage = '<span class="text-dander">' + error.text() + '</span>';
//             console.log(error, errorMessage);
//             // error.html(errorMessage);
//             error.insertAfter(element);
//         },
//         submitHandler: function (form) {
//             // Comment form submission logic (if needed)
//             form.submit();
//         },
//     });
// });
