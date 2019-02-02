/**
 * Get hours with a leading zero if appropriate.
 */
function getFullSeconds () {
    const seconds = this.getSeconds();
    return `0${seconds}`.slice(-2);
}

export default getFullSeconds;
