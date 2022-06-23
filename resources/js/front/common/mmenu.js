// Add DomLoader for Mmenu.
document.addEventListener(
    'DOMContentLoaded', () => {
        new Mmenu('#mobile-menu', {
               "offCanvas": {
                  "position": "right"
              },
            });
    }
);
