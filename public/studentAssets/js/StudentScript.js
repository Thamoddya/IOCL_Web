$('#course_video').bind('contextmenu',function() { return false; });
addEventListener("contextmenu", (event) => {});

oncontextmenu = (event) => {};

function openPdfModal(pdfUrl) {
    // Calculate the center position of the new window
    let centerLeft = parseInt((window.screen.availWidth - 800) / 2);
    let centerTop = parseInt(((window.screen.availHeight - 650) / 2) - 50);
    let misc_features = ', status=no, location=no, scrollbars=yes, resizable=yes';

    let windowFeatures = 'width=' + 810 + ',height=' + 650 + ',left=' + centerLeft + ',top=' + centerTop + misc_features;

    // Open the new window
    let popupWin = window.open('', '_blank', windowFeatures);
    popupWin.focus();
    popupWin.document.open();
    popupWin.document.write(`
        <html>
            <head>
                <title>PDF Viewer</title>
                <style>
                    body { margin: 0; }
                    iframe { width: 100%; height: 100%; border: none; }
                </style>
            </head>
            <body>
                <iframe src="${pdfUrl}" frameborder="0"></iframe>
            </body>
        </html>
    `);
    popupWin.document.close();
}

