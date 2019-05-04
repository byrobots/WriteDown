/**
 * Returns the seconds of a given date with the leading 0 where appropriate.
 *
 * @param {Object} date The Date object.
 *
 * @return {String}
 */
function getFullSeconds (date) {
  const seconds = date.getSeconds()
  return `0${seconds}`.slice(-2)
}

export default getFullSeconds
