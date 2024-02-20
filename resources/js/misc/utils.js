/**
 * Split (Black Theme)
 */
const splitBlack = (element, index, delay = 100, limit, anchor) => {
    element.setAttribute('data-aos', 'fade-right');
    element.setAttribute('data-aos-anchor', anchor);
    element.setAttribute('data-aos-offset', 0);
    element.setAttribute('data-aos-delay', delay);
    index < limit
        ? element.classList.add('text-white')
        : element.classList.add('text-fr-yellow');
};

/**
 * Split (Cappuccino Theme)
 */
const splitCappuccino = (element, index, delay = 100, limit, anchor) => {
    element.setAttribute('data-aos', 'fade-right');
    element.setAttribute('data-aos-anchor', anchor);
    element.setAttribute('data-aos-offset', 0);
    element.setAttribute('data-aos-delay', delay);
    index < limit
        ? element.classList.add('text-fr-green')
        : element.classList.add('text-fr-red');
};

/**
 * Description Component
 */
const splitDescriptionBlack = (element, index, delay = 100, limit, group) => {
    (group + 1) % 2 == 1
        ? element.setAttribute('data-aos', 'fade-left')
        : element.setAttribute('data-aos', 'fade-right');
    element.setAttribute('data-aos-offset', 0);
    element.setAttribute('data-aos-delay', delay);
    index < limit
        ? element.classList.add('text-white')
        : element.classList.add('text-fr-yellow');
};

const splitDescriptionCappuccino = (
    element,
    index,
    delay = 100,
    limit,
    group,
) => {
    (group + 1) % 2 == 1
        ? element.setAttribute('data-aos', 'fade-left')
        : element.setAttribute('data-aos', 'fade-right');
    element.setAttribute('data-aos-offset', 0);
    element.setAttribute('data-aos-delay', delay);
    index < limit
        ? element.classList.add('text-fr-green')
        : element.classList.add('text-fr-red');
};

export {
    splitBlack,
    splitCappuccino,
    splitDescriptionBlack,
    splitDescriptionCappuccino,
};
