export default function () {
    setTimeout(() => {
        if ( window.history.replaceState ) {
            window.history.replaceState( null, "", window.location.href );
        }
        // @ts-ignore
        window.location = window.location.href;
    }, 3000)
}
