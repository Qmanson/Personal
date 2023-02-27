window.addEventListener('scroll', function () {
    const yPos = -window.scrollY / 2;
    document.querySelector("main").style.backgroundPositionY = `${yPos}px`;
});

