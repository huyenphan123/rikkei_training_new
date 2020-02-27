
// windown.onload = function () {
//     checkAll();
//     check(i);

// }

function setHeadCheckbox(elm) {
    var countChecked = 0;
    if ($(elm).prop("checked") == true) {
        $('.checkbox-set-head').each(function () {
            if ($(this).prop("checked") !== true) {
                $(this).css('cursor', 'not-allowed');
            } else {
                countChecked = countChecked + 1;
            }
        });
        if (countChecked > 1) {
            $(elm).prop("checked", false);
        }
    } else {
        $('.checkbox-set-head').each(function () {
            if (!$(this).hasClass('no-drop')) {
                $(this).css('cursor', 'default');
            }
        });
    }
        // if ($(elm).is(':checked')) {
        //     $('.checkbox-set-head').each(function () {
        //         if (!$(elm).is(':checked')) {
        //             $(this).css('cursor', 'no-drop');
        //         }
        //     })
        // } else {
        //     $('.checkbox-set-head').each(function () {
        //         $(this).css('cursor', 'default');
        //     })
        // }
}

function checkAll() {
    var checkbox = document.getElementsByName("ck[]");
    var ckAll = document.getElementById("ckAll");

    // Viết theo jquery:(phải tải thư viện )
    // var ck1 = $('[name="ck[]"]');
    // var ckAll = $("#ckAll")[0];

    if (checkbox.length > 0) {
        if (ckAll.checked == true) {
            for (var i = 0; i < checkbox.length; i++) {
                checkbox[i].checked = true;
            }
        } else {
            for (var i = 0; i < checkbox.length; i++) {
                checkbox[i].checked = false;
            }
        }
    }
}

// bỏ 1 ô thì checkAll bị bỏ
function check(i) {
    var ckAll = $("#ckAll")[0];
    if (i == false) ckAll.checked = false;
}

function multipleReset() {
    if (confirm('Are you sure to reset password these record?')) {
        var ck = $('[name= "ck[]"]');
        var value = null;
        for (i = 0; i < ck.length; i++) {
            if (ck[i].checked){
                if(value === null) {
                   value = ck[i].value;
                } else {
                    value = value + ',' + ck[i].value;
                }
            }
        }
        $("#ids").val(value);
        $('[name= "frmReset"]').submit();
    }
}

function setHeadDepartment() {

}





