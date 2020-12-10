$('.datepicker').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    language: 'pt-BR'
})

$('#addLecture').click(() => {
    $('#id').val('')
    $('#title').val('')
    $('#date').val('')
    $('#event').prop('selectedIndex', 0)
    $('#startTime').val('')
    $('#endTime').val('')
    $('#description').val('')
    $('#speaker').prop('selectedIndex', 0)
    $('#modalLectures').modal('show')
})

function datatableLectures() {
    tableLectures = $(`#tableLectures`).DataTable({
        sPaginationType: "full_numbers",
        destroy: true,
        responsive: false,
        ajax: {
            url: `${BASE_URL}/api/v1/lectures`,
            dataType: "JSON",
            cache: false,
            dataSrc: (data) => {
                return data.data || []
            },
            error: (e) => {
                $("#addLectures").removeAttr("disabled").find("i").removeClass("fa-spinner fa-spin").addClass("fa-plus")
            },
            beforeSend: (xhr) => {
                xhr.setRequestHeader(`Authorization`, `Bearer ${localStorage.getItem('access_token')}`)
                $("#addLectures").attr("disabled", true).find("i").removeClass("fa-plus").addClass("fa-spinner fa-spin")
            },
            complete: () => {
                $("#addLectures").removeAttr("disabled").find("i").removeClass("fa-spinner fa-spin").addClass("fa-plus")
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
                data: "date",
                class: "text-left",
                render: (data) => {
                    return dateToDayMonthYear(data)
                }
            },
            {
                data: "event_id",
                class: "text-left"
            },
            {
                data: "start_time",
                class: "text-left"
            },
            {
                data: "end_time",
                class: "text-left"
            },
            {
                data: "description",
                class: "text-left"
            },
            {
                data: "speaker_id",
                class: "text-left"
            },
            {
                orderable: false,
                data: null,
                defaultContent: ``,
                render: (data, type, row, meta) => {
                    return `
                    <button type="button" class="btn btn-purple btn-sm" onclick="editModalLecture('${data.id}', '${data.title}', '${dateToDayMonthYear(data.start_date)}', '${dateToDayMonthYear(data.end_date)}', '${data.description}')"> <i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteLecture('${data.id}')"> <i class="fa fa-trash"></i></button>`
                }
            }
        ]
    })
}

function editModalLecture(id, title, date, event, start_time, end_time, description, speaker) {
    $('#id').val('').val(id)
    $('#title').val('').val(title)
    $('#date').val('').val(date)
    $('#event').val('').val(event)
    $('#startTime').val('').val(start_time)
    $('#endTime').val('').val(end_time)
    $('#description').val('').val(description)
    $('#speaker').val('').val(speaker)
    $('#modalEvents').modal('show')
}

function deleteLecture(id) {
    $.ajax({
        url: `${BASE_URL}/api/v1/lectures/delete/${id}`,
        method: "DELETE",
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200) {
                toastr.success('Lecture is deleted!', 'Success!')
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

$('#saveLecture').on('click', () => {

    const params = {
        url: `${BASE_URL}/api/v1/lecture/create`,
        method: 'POST',
        data: {
            title: $('#title').val().trim(),
            date: dateToYearMonthDay($('#date').val().trim()),
            event_id: $('#event option:selected').val(),
            start_time: $('#startTime').val().trim(),
            end_time: $('#endTime').val().trim(),
            description: $('#description').val().trim(),
            speaker_id: $('#speaker option:selected').val()
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

    if ($('#date').val().trim() === "") {
        toastr.warning('Date is required', 'Warning')
        return
    }

    if ($('#event option:selected').val().trim() === "") {
        toastr.warning('Event is required', 'Warning')
        return
    }

    if ($('#startTime').val().trim() === "") {
        toastr.warning('Start time is required', 'Warning')
        return
    }

    if ($('#endTime').val().trim() === "") {
        toastr.warning('End time is required', 'Warning')
        return
    }

    if ($('#description').val().trim() === "") {
        toastr.warning('Description is required', 'Warning')
        return
    }

    if ($('#speaker option:selected').val().trim() === "") {
        toastr.warning('Speaker is required', 'Warning')
        return
    }

    $.ajax({
        url: params.url,
        method: params.method,
        data: params.data,
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200 || data.code === 201) {
                toastr.success('Lecture created/updated!', 'Success!')
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

    $('#modalLectures').modal('hide')
})
