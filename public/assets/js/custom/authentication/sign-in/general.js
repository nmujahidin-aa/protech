"use strict";
var KTSigninGeneral = function () {
    var t, e, r;
    return {
        init: function () {
            t = document.querySelector("#kt_sign_in_form"),
            e = document.querySelector("#kt_sign_in_submit"),
            r = FormValidation.formValidation(t, {
                fields: {
                    email: {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: "The value is not a valid email address"
                            },
                            notEmpty: {
                                message: "Email address is required"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            });

            e.addEventListener("click", function (i) {
                i.preventDefault();
                r.validate().then(function (r) {
                    if ("Valid" == r) {
                        e.setAttribute("data-kt-indicator", "on");
                        e.disabled = !0;

                        // Perform the AJAX request
                        axios.post(e.closest("form").getAttribute("action"), new FormData(t))
                            .then(function (response) {
                                // Check if success
                                if (response.data.status === 'success') {
                                    // Redirect immediately
                                    var redirectUrl = response.data.redirect_url;
                                    if (redirectUrl) {
                                        location.href = redirectUrl;
                                    }
                                }
                                // Check if invalid credentials
                                else if (response.data.status === 'error' && response.data.error_type === 'invalid_credentials') {
                                    Swal.fire({
                                        text: "Mohon maaf, email atau password yang Anda masukkan salah.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                }
                                // Any other errors
                                else {
                                    Swal.fire({
                                        text: response.data.message || "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                }
                            })
                            .catch(function (error) {
                                // Error on request (could be network issue, server down, etc.)
                                Swal.fire({
                                    text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            })
                            .finally(function () {
                                e.removeAttribute("data-kt-indicator");
                                e.disabled = !1;
                            });
                    } else {
                        // Form validation failed
                        Swal.fire({
                            text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            });
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
