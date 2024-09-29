"use strict";
var KTSignupGeneral = function () {
    var e, t, r, a, s = function () { return a.getScore() > 50 };
    return {
        init: function () {
            e = document.querySelector("#kt_sign_up_form"),
                t = document.querySelector("#kt_sign_up_submit"),
                a = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]'));

            !function (e) {
                try { return new URL(e), !0 } catch (e) { return !1 }
            }(t.closest("form").getAttribute("action")) ?
                (
                    r = FormValidation.formValidation(e, {
                        fields: {
                            "first-name": { validators: { notEmpty: { message: "First Name is required" } } },
                            "last-name": { validators: { notEmpty: { message: "Last Name is required" } } },
                            email: {
                                validators: {
                                    regexp: {
                                        regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                        message: "The value is not a valid email address"
                                    },
                                    notEmpty: { message: "Email address is required" }
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: { message: "The password is required" },
                                    callback: {
                                        message: "Please enter valid password",
                                        callback: function (e) {
                                            if (e.value.length > 0) return s()
                                        }
                                    }
                                }
                            },
                            "confirm-password": {
                                validators: {
                                    notEmpty: { message: "The password confirmation is required" },
                                    identical: {
                                        compare: function () { return e.querySelector('[name="password"]').value },
                                        message: "The password and its confirm are not the same"
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger({ event: { password: !1 } }),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".fv-row",
                                eleInvalidClass: "",
                                eleValidClass: ""
                            })
                        }
                    }),
                    t.addEventListener("click", function (s) {
                        s.preventDefault(),
                            r.revalidateField("password"),
                            r.validate().then(function (r) {
                                "Valid" == r ? (
                                    t.setAttribute("data-kt-indicator", "on"),
                                    t.disabled = !0,
                                    setTimeout(function () {
                                        t.removeAttribute("data-kt-indicator"),
                                            t.disabled = !1,
                                            Swal.fire({
                                                text: "You have successfully registered!",
                                                icon: "success",
                                                buttonsStyling: !1,
                                                showConfirmButton: false, // Hide the confirm button
                                                timer: 2000, // 2 seconds timer
                                                customClass: { confirmButton: "btn btn-primary" }
                                            });
                                        setTimeout(function () {
                                            e.reset(),
                                                a.reset();
                                            // Redirect to auth.login route
                                            location.href = '/auth/login';
                                        }, 2000); // 2 seconds delay before redirect
                                    }, 1500)) : Swal.fire({
                                        text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: { confirmButton: "btn btn-primary" }
                                    })
                            })
                    }),
                    e.querySelector('input[name="password"]').addEventListener("input", function () {
                        this.value.length > 0 && r.updateFieldStatus("password", "NotValidated")
                    })
                )
                :
                (
                    r = FormValidation.formValidation(e, {
                        fields: {
                            name: { validators: { notEmpty: { message: "Name is required" } } },
                            email: {
                                validators: {
                                    regexp: {
                                        regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                        message: "The value is not a valid email address"
                                    },
                                    notEmpty: { message: "Email address is required" }
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: { message: "The password is required" },
                                    callback: {
                                        message: "Please enter valid password",
                                        callback: function (e) {
                                            if (e.value.length > 0) return s()
                                        }
                                    }
                                }
                            },
                            password_confirmation: {
                                validators: {
                                    notEmpty: { message: "The password confirmation is required" },
                                    identical: {
                                        compare: function () { return e.querySelector('[name="password"]').value },
                                        message: "The password and its confirm are not the same"
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger({ event: { password: !1 } }),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".fv-row",
                                eleInvalidClass: "",
                                eleValidClass: ""
                            })
                        }
                    }),
                    t.addEventListener("click", function (a) {
                        a.preventDefault(),
                            r.revalidateField("password"),
                            r.validate().then(function (r) {
                                "Valid" == r ? (
                                    t.setAttribute("data-kt-indicator", "on"),
                                    t.disabled = !0,
                                    axios.post(t.closest("form").getAttribute("action"), new FormData(e))
                                        .then(function (t) {
                                            if (t) {
                                                e.reset();
                                                const t = e.getAttribute("data-kt-redirect-url");
                                                Swal.fire({
                                                    text: "Berhasil, Silakan masuk menggunakan email Anda untuk melanjutkan.",
                                                    icon: "success",
                                                    buttonsStyling: !1,
                                                    confirmButtonText: "Ok, got it!", // Hide the confirm button
                                                    timer: 2000, // 2 seconds timer
                                                    customClass: { confirmButton: "btn btn-primary" }
                                                });
                                                setTimeout(function () {
                                                    // Redirect to auth.login route
                                                    location.href = '/auth/login';
                                                }, 2000); // 2 seconds delay before redirect
                                            } else Swal.fire({
                                                text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                                icon: "error",
                                                buttonsStyling: !1,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: { confirmButton: "btn btn-primary" }
                                            })
                                        })
                                        .catch(function (e) {
                                            Swal.fire({
                                                text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                                icon: "error",
                                                buttonsStyling: !1,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: { confirmButton: "btn btn-primary" }
                                            })
                                        })
                                        .then(function () {
                                            t.removeAttribute("data-kt-indicator"),
                                                t.disabled = !1
                                        })
                                ) : Swal.fire({
                                    text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" }
                                })
                            })
                    }),
                    e.querySelector('input[name="password"]').addEventListener("input", function () {
                        this.value.length > 0 && r.updateFieldStatus("password", "NotValidated")
                    })
                )
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTSignupGeneral.init();
});
