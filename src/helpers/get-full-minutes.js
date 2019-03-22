/**
 * Returns the minutes of a given date with the leading 0 where appropriate.
 *
 * @param {Object} date The Date object.
 *
 * @return {String}
 */
function getFullMinutes (date) {
  const minutes = date.getMinutes()
  return `0${minutes}`.slice(-2)
}

export default getFullMinutes
