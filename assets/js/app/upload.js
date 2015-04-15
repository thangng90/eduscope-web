$(function () {
    var Dropzone = require("enyo-dropzone");
    Dropzone.autoDiscover = false;
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    var vUp = new Dropzone(document.querySelector("#previews"), {
        url: "php/uploadController.php",
        thumbnailWidth: 400,
        thumbnailHeight: 300,
        parallelUploads: 3,
        acceptedFiles: ".jpg",
        previewTemplate: previewTemplate,
        autoQueue: false,
        previewsContainer: "#previews",
        clickable: ".add-file, #previews",
        //uploadMultiple: true,
        dictCancelUploadConfirmation: 'Bạn muốn hủy tiến trình Upload?',
        dictInvalidFileType: 'File không hợp lệ',
        dictResponseError: 'Lỗi máy chủ: {{statusCode}}'
    });

    vUp.on("addedfile", function (file) {
        var des = file.previewElement.querySelector(".description");
        des.name = file.name;
    }).on("totaluploadprogress", function (progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    }).on("sending", function (file, xhr, formData) {
        document.querySelector("#total-progress").style.opacity = "1";
        formData.append("description", file.previewElement.querySelector(".description").value);
        formData.append("album-id", $(".alb-select").val());
        formData.append("album-name", $(".alb-name").val().trim());
        //formData.append("description", $("textarea[name='" + file.name + "']").val());
    }).on("success", function(file) {
        file.previewElement.querySelector(".description").disabled = true;
    }).on("queuecomplete", function (progress) {
        $("#total-progress").css("opacity", 0);
    });

    document.querySelector("#actions .start").onclick = function () {
        var albname = $(".alb-name").val().trim();
        if(!albname) {
            alert("Vui lòng chọn album");
            return !1;
        }
        vUp.enqueueFiles(vUp.getFilesWithStatus(Dropzone.ADDED));
    };
    document.querySelector("#actions .cancel").onclick = function () {
        vUp.removeAllFiles(true);
    };

    // ================================
    $(".alb-name").on('keyup focusout', function () {
        var name = $(this).val().trim(),
            ex = $(".alb-select option").filter(function () {
                return $(this).text().trim() == name;
            }).val();
        $(".alb-select").val(ex || '').trigger('chosen:updated');
    });

    $(".alb-select").change(function () {
        $(".alb-name").val($(".alb-select option:selected").text());
    });
});