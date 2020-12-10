let tableSpeakers, tableEvents, tableLectures


function dateToDayMonthYear(strDate) {
    if (!strDate)
        return `00/00/0000`

    const dateFormatted = strDate.split('-')

	if (dateFormatted.length === 3) {
		return `${dateFormatted[2].substring(0, 2)}/${dateFormatted[1]}/${dateFormatted[0]}`
	}
}

function dateToYearMonthDay(strDate) {
    if (!strDate)
        return `0000-00-00`

	const dateFormatted = strDate.split('/')

	if (dateFormatted.length === 3) {
		return `${dateFormatted[2]}-${dateFormatted[1]}-${dateFormatted[0]}`
	}
}
