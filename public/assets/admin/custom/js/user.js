$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    $("#add-role").select2({
        dropdownParent: $("#addModal"),
    });

    $("#edit-role").select2({
        dropdownParent: $("#editModal"),
    });

    $(".add").on("click", function () {
        var button = $(this);
        button.prop("disabled", true);
        button.find("span").text("Loading...");
        var modalId = "#addModal";
        var formData = new FormData();
        var url = $(this).data("url");

        var inputName = $(modalId + ' input[name="name"]').val();
        var inputEmail = $(modalId + ' input[name="email"]').val();
        var inputPhone = $(modalId + ' input[name="phone"]').val();
        var inputPassword = $(modalId + ' input[name="password"]').val();
        var inputRole = $(modalId + ' select[name="role"]').val();
        var inputAddress = $(modalId + ' textarea[name="address"]').val();

        formData.append("name", inputName);
        formData.append("email", inputEmail);
        formData.append("phone", inputPhone);
        formData.append("password", inputPassword);
        formData.append("role", inputRole);
        formData.append("address", inputAddress);
        formData.append("_token", csrfToken);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: "Sukses!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(modalId).modal("hide");
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Gagal!",
                        text: response.message,
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                }
            },
            error: function (xhr, status, error) {
                var errors = xhr.responseJSON.errors;
                var errorMessage = "";
                $.each(errors, function (key, value) {
                    errorMessage += value[0] + "\n";
                });

                Swal.fire({
                    title: "Error!",
                    text: errorMessage,
                    icon: "error",
                    confirmButtonText: "OK",
                });
            },
            complete: function () {
                button.prop("disabled", false);
                button.find("span").text("Simpan");
            },
        });
    });

    $(".updateBtn").on("click", function (e) {
        e.preventDefault();

        let name = $(this).data("name");
        let email = $(this).data("email");
        let phone = $(this).data("phone");
        let role = $(this).data("role");
        let address = $(this).data("address");
        let url = $(this).data("url");

        $("#editModal input[name='name']").val(name);
        $("#editModal input[name='email']").val(email);
        $("#editModal input[name='phone']").val(phone);
        $("#editModal select[name='role']").val(role).trigger("change");
        $("#editModal textarea[name='address']").val(address);

        $(".save").data("url", url);

        $("#editModal").modal("show");
    });

    $(".save").on("click", function (e) {
        e.preventDefault();
        var button = $(this);
        button.prop("disabled", true);
        button.find("span").text("Loading...");

        let url = $(this).data("url");

        let formData = new FormData();
        formData.append("name", $("#editModal input[name='name']").val());
        formData.append("email", $("#editModal input[name='email']").val());
        formData.append("phone", $("#editModal input[name='phone']").val());
        formData.append("role", $("#editModal select[name='role']").val());
        formData.append(
            "address",
            $("#editModal textarea[name='address']").val()
        );
        formData.append("_token", csrfToken);
        formData.append("_method", "PUT");

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: "Sukses!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#editModal").modal("hide");
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: response.message || "Terjadi kesalahan.",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                }
            },
            error: function (xhr) {
                Swal.fire({
                    title: "Error!",
                    text: "Gagal memperbarui data. Silakan coba lagi.",
                    icon: "error",
                    confirmButtonText: "OK",
                });
            },
            complete: function () {
                button.prop("disabled", false);
                button.find("span").text("Simpan");
            },
        });
    });

    $(".deleteBtn").on("click", function (e) {
        e.preventDefault();

        let url = $(this).data("url");
        let name = $(this).data("name");

        Swal.fire({
            title: "Yakin?",
            html:
                "anda yakin ingin menghapus <strong class='text-danger'>" +
                name +
                "</strong> sebagai pengguna?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _method: "DELETE",
                        _token: csrfToken,
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "Sukses!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK",
                        }).then(function () {
                            if (result.isConfirmed) {
                                $("#editModal").modal("hide");
                                location.reload();
                            }
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            title: "Kesalahan!",
                            text: "Terjadi kesalahan, silakan coba kembali.",
                            icon: "error",
                        });
                    },
                });
            }
        });
    });

    $(".activatedBtn").on("click", function (e) {
        e.preventDefault();

        let url = $(this).data("url");
        let name = $(this).data("name");

        Swal.fire({
            title: "Yakin?",
            html:
                "Anda yakin ingin mengaktifkan <strong class='text-success'>" +
                name +
                "</strong> sebagai pengguna?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Aktifkan!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _method: "PUT",
                        _token: csrfToken,
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "Sukses!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK",
                        }).then(function () {
                            if (result.isConfirmed) {
                                $("#editModal").modal("hide");
                                location.reload();
                            }
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            title: "Kesalahan!",
                            text: "Terjadi kesalahan, silakan coba kembali.",
                            icon: "error",
                        });
                    },
                });
            }
        });
    });

    $(".disactivatedBtn").on("click", function (e) {
        e.preventDefault();

        let url = $(this).data("url");
        let name = $(this).data("name");

        Swal.fire({
            title: "Yakin?",
            html:
                "Anda yakin ingin menonaktifkan <strong class='text-success'>" +
                name +
                "</strong> sebagai pengguna?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Nonaktifkan!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _method: "PUT",
                        _token: csrfToken,
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "Sukses!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK",
                        }).then(function () {
                            if (result.isConfirmed) {
                                $("#editModal").modal("hide");
                                location.reload();
                            }
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            title: "Kesalahan!",
                            text: "Terjadi kesalahan, silakan coba kembali.",
                            icon: "error",
                        });
                    },
                });
            }
        });
    });
});
