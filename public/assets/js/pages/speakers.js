$('#addSpeaker').click(() => {
    $('#id').val('')
    $('#name').val('')
    $('#modalSpeakers').modal('show')
})

function datatableSpeakers() {
    tableSpeakers = $(`#tableSpeakers`).DataTable({
        sPaginationType: "full_numbers",
        destroy: true,
        responsive: false,
        ajax: {
            url: `${BASE_URL}/api/v1/speakers`,
            dataType: "JSON",
            cache: false,
            dataSrc: (data) => {
                return data.data || []
            },
            error: (e) => {
                $("#addSpeaker").removeAttr("disabled").find("i").removeClass("fa-spinner fa-spin").addClass("fa-plus")
            },
            beforeSend: (xhr) => {
                xhr.setRequestHeader(`Authorization`, `Bearer ${localStorage.getItem('access_token')}`)
                $("#addSpeaker").attr("disabled", true).find("i").removeClass("fa-plus").addClass("fa-spinner fa-spin")
            },
            complete: () => {
                $("#addSpeaker").removeAttr("disabled").find("i").removeClass("fa-spinner fa-spin").addClass("fa-plus")
            }
        },
        order: [[0, "DESC"]],
        columns: [
            {
                data: "id",
                class: "text-right",
            },
            {
                data: "name",
                class: "text-left",
            },
            {
                orderable: false,
                data: null,
                defaultContent: ``,
                render: (data, type, row, meta) => {
                    return `
                    <button type="button" class="btn btn-purple btn-sm" onclick="editModal('${data.id}', '${data.name}')"> <i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm"  onclick="deleteSpeaker('${data.id}')"> <i class="fa fa-trash"></i></button>`
                }
            }
        ]
    })
}

function editModal(id, name) {
    $('#id').val('').val(id)
    $('#name').val('').val(name)
    $('#modalSpeakers').modal('show')
}

function deleteSpeaker(id) {
    $.ajax({
        url: `${BASE_URL}/api/v1/speakers/delete/${id}`,
        method: "DELETE",
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200) {
                toastr.success('Speaker is deleted!', 'Success!')
                tableSpeakers.ajax.reload()
            }
        },
        beforeSend: (xhr) => {
            xhr.setRequestHeader(`Authorization`, `Bearer ${localStorage.getItem('access_token')}`)
        },
        error: (e) => {
            toastr.error('Ops, a error ocurred!', 'Error!')
        }
    })
}

$('#saveSpeaker').on('click', () => {

    const params = {
        url: `${BASE_URL}/api/v1/speakers/create`,
        method: 'POST',
        data: {
            name: $('#name').val().trim()
        }
    }

    if ($('#id').val().trim()) {
        params.url     = `${BASE_URL}/api/v1/speakers/update/${$('#id').val().trim()}`
        params.method  = 'PUT'
        params.data.id = parseInt($('#id').val().trim())
    }

    if ($('#name').val().trim() === "") {
        toastr.warning('Name is required', 'Warning')
        return
    }

    $.ajax({
        url: params.url,
        method: params.method,
        data: params.data,
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200 || data.code === 201) {
                toastr.success('Speaker created/updated!', 'Success!')
            } else {
                toastr.warning(data.data, 'Warning!')
            }

            tableSpeakers.ajax.reload()
        },
        beforeSend: (xhr) => {
            xhr.setRequestHeader(`Authorization`, `Bearer ${localStorage.getItem('access_token')}`)
        },
        error: (e) => {
            console.log(e)
            toastr.error('Ops, a error ocurred!', 'Error!')
        }
    })

    $('#modalSpeakers').modal('hide')
})
