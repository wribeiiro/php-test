$('.datepicker').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    language: 'pt-BR'
})

$('#addEvent').click(() => {
    $('#id').val('')
    $('#title').val('')
    $('#startDate').val('')
    $('#endDate').val('')
    $('#description').val('')
    $('#modalEvents').modal('show')
})

function datatableEvents() {
    tableEvents = $(`#tableEvents`).DataTable({
        sPaginationType: "full_numbers",
        destroy: true,
        responsive: false,
        ajax: {
            url: `${BASE_URL}/api/v1/events`,
            dataType: "JSON",
            cache: false,
            dataSrc: (data) => {
                return data.data || []
            },
            error: (e) => {
                $("#addEvents").removeAttr("disabled").find("i").removeClass("fa-spinner fa-spin").addClass("fa-plus")
            },
            beforeSend: (xhr) => {
                xhr.setRequestHeader(`Authorization`, `Bearer ${localStorage.getItem('access_token')}`)
                $("#addEvents").attr("disabled", true).find("i").removeClass("fa-plus").addClass("fa-spinner fa-spin")
            },
            complete: () => {
                $("#addEvents").removeAttr("disabled").find("i").removeClass("fa-spinner fa-spin").addClass("fa-plus")
            }
        },
        order: [[0, "DESC"]],
        columns: [
            {
                data: "id",
                class: "text-right",
            },
            {
                data: "title",
                class: "text-left",
            },
            {
                data: "start_date",
                class: "text-left",
                render: (data) => {
                    return dateToDayMonthYear(data)
                }
            },
            {
                data: "end_date",
                class: "text-left",
                render: (data) => {
                    return dateToDayMonthYear(data)
                }
            },
            {
                data: "description",
                class: "text-left"
            },
            {
                orderable: false,
                data: null,
                defaultContent: ``,
                render: (data, type, row, meta) => {
                    return `
                    <button type="button" class="btn btn-purple btn-sm" onclick="editModalEvent('${data.id}', '${data.title}', '${dateToDayMonthYear(data.start_date)}', '${dateToDayMonthYear(data.end_date)}', '${data.description}')"> <i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm"  onclick="deleteEvent('${data.id}')"> <i class="fa fa-trash"></i></button>`
                }
            }
        ]
    })
}

function editModalEvent(id, title, start_date, end_date, description) {
    $('#id').val('').val(id)
    $('#title').val('').val(title)
    $('#startDate').val('').val(start_date)
    $('#endDate').val('').val(end_date)
    $('#description').val('').val(description)
    $('#modalEvents').modal('show')
}

function deleteEvent(id) {
    $.ajax({
        url: `${BASE_URL}/api/v1/events/delete/${id}`,
        method: "DELETE",
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200) {
                toastr.success('Event is deleted!', 'Success!')
                tableEvents.ajax.reload()
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

$('#saveEvent').on('click', () => {

    const params = {
        url: `${BASE_URL}/api/v1/events/create`,
        method: 'POST',
        data: {
            title: $('#title').val().trim(),
            start_date: dateToYearMonthDay($('#startDate').val().trim()),
            end_date: dateToYearMonthDay($('#endDate').val().trim()),
            description: $('#description').val().trim(),
        }
    }

    if ($('#id').val().trim()) {
        params.url         = `${BASE_URL}/api/v1/events/update/${$('#id').val().trim()}`
        params.method      = 'PUT'
        params.data.id     = parseInt($('#id').val().trim())
    }

    if ($('#title').val().trim() === "") {
        toastr.warning('Title is required', 'Warning')
        return
    }

    if ($('#startDate').val().trim() === "") {
        toastr.warning('Start date is required', 'Warning')
        return
    }

    if ($('#endDate').val().trim() === "") {
        toastr.warning('End date is required', 'Warning')
        return
    }

    if ($('#description').val().trim() === "") {
        toastr.warning('Description is required', 'Warning')
        return
    }

    $.ajax({
        url: params.url,
        method: params.method,
        data: params.data,
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200 || data.code === 201) {
                toastr.success('Event created/updated!', 'Success!')
            } else {
                toastr.warning(data.data, 'Warning!')
            }

            tableEvents.ajax.reload()
        },
        beforeSend: (xhr) => {
            xhr.setRequestHeader(`Authorization`, `Bearer ${localStorage.getItem('access_token')}`)
        },
        error: (e) => {
            console.log(e)
            toastr.error('Ops, a error ocurred! ' + e.responseJSON.data, 'Error!')
        }
    })

    $('#modalEvents').modal('hide')
})
