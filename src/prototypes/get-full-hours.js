/**
 * Get hours with a leading zero if appropriate.
 */
function getFullHours () {
    const hours = this.getHours();
    return `0${hours}`.slice(-2);
}

export default getFullHours;
