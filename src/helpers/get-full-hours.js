/**
 * Returns the hours of a given date with the leading 0 where appropriate.
 *
 * @param {Object} date The Date object.
 *
 * @return {String}
 */
function getFullHours (date) {
  const hours = date.getHours()
  return `0${hours}`.slice(-2)
}

export default getFullHours
