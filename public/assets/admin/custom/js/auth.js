$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    $(".login").on("click", function () {
        var button = $(this);
        button.prop("disabled", true);
        button.find("span").text("Memuat...");

        var url = $(this).data("url");
        var formData = new FormData();
        formData.append("email", $("input[name='email']").val());
        formData.append("password", $("input[name='password']").val());
        formData.append("_token", csrfToken);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);

                if (response.success) {
                    Swal.fire({
                        title: "Sukses!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then(function () {
                        window.location = response.redirect_url;
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
                Swal.fire({
                    title: "Gagal!",
                    text:
                        xhr.responseJSON?.message ||
                        "Terjadi kesalahan, silakan coba lagi.",
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

    $(".register").on("click", function () {
        var button = $(this);
        button.prop("disabled", true);
        button.find("span").text("Memuat...");

        var url = $(this).data("url");
        var formData = new FormData();
        formData.append("name", $("input[name='name']").val());
        formData.append("phone", $("input[name='whatsapp']").val());
        formData.append("email", $("input[name='email']").val());
        formData.append("password", $("input[name='password']").val());
        formData.append(
            "password_confirmation",
            $("input[name='password_confirmation']").val()
        );
        formData.append("_token", csrfToken);

        $.ajax({
            type: "POST",
            url: url,
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
                    }).then(function () {
                        window.location = response.redirect_url;
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
            error: function (xhr) {
                Swal.fire({
                    title: "Gagal!",
                    text:
                        xhr.responseJSON?.message ||
                        "Terjadi kesalahan, silakan coba lagi.",
                    icon: "error",
                    confirmButtonText: "OK",
                });
            },
            complete: function () {
                button.prop("disabled", false);
                button.find("span").text("Daftar");
            },
        });
    });
});
