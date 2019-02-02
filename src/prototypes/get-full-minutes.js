/**
 * Get minutes with a leading zero if appropriate.
 */
function getFullMinutes () {
    const minutes = this.getMinutes();
    return `0${minutes}`.slice(-2);
}

export default getFullMinutes;
