const splitBlack = (element, index, delay = 100, limit) => {
    element.setAttribute('data-aos', 'fade-right');
    element.setAttribute('data-aos-anchor', '#black-anchor');
    element.setAttribute('data-aos-offset', 0);
    element.setAttribute('data-aos-delay', delay);
    index < limit ? element.classList.add('text-white') : element.classList.add('text-fr-yellow');
};

const splitCappucino = (element, index, delay = 100, limit) => {
    element.setAttribute('data-aos', 'fade-right');
    element.setAttribute('data-aos-anchor', '#cappucino-anchor');
    element.setAttribute('data-aos-offset', 0);
    element.setAttribute('data-aos-delay', delay);
    index < limit ? element.classList.add('text-fr-green') : element.classList.add('text-fr-red');
};

const splitDescriptionBlack = (element, index, delay = 100, limit, group) => {
    (group + 1) % 2 == 1
        ? element.setAttribute('data-aos', 'fade-left')
        : element.setAttribute('data-aos', 'fade-right');
    element.setAttribute('data-aos-offset', 0);
    element.setAttribute('data-aos-delay', delay);
    index < limit ? element.classList.add('text-white') : element.classList.add('text-fr-yellow');
};

const splitDescriptionCappucino = (element, index, delay = 100, limit, group) => {
    (group + 1) % 2 == 1
        ? element.setAttribute('data-aos', 'fade-left')
        : element.setAttribute('data-aos', 'fade-right');
    element.setAttribute('data-aos-offset', 0);
    element.setAttribute('data-aos-delay', delay);
    index < limit ? element.classList.add('text-fr-green') : element.classList.add('text-fr-red');
};

export { splitBlack, splitCappucino, splitDescriptionBlack, splitDescriptionCappucino };
