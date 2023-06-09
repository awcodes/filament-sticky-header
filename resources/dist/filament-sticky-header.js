(() => {
  // resources/js/plugin.js
  var filamentTopbar = document.querySelector(".filament-main-topbar");
  var filamentMainContent = document.querySelector(".filament-main-content");
  var filamentHeader = document.querySelector(".filament-header");
  if (filamentTopbar && filamentMainContent && filamentHeader) {
    window.addEventListener("load", function() {
      var _a, _b;
      const trigger = document.createElement("div");
      const theme = ((_a = filamentData == null ? void 0 : filamentData.stickyIsFloating) != null ? _a : false) ? "floating" : "default";
      const topBarSticky = (_b = filamentData == null ? void 0 : filamentData.stickyTopBar) != null ? _b : true;
      const colors = filamentData == null ? void 0 : filamentData.stickyColors;
      const opacity = filamentData == null ? void 0 : filamentData.stickyOpacity;
      trigger.classList.add("filament-sticky-trigger");
      filamentMainContent.prepend(trigger);
      filamentMainContent.classList.add(`sticky-theme-${theme}`);
      let offsetHeight = filamentTopbar.offsetHeight;
      if (!topBarSticky) {
        filamentTopbar.classList.remove("sticky");
        offsetHeight = 0;
      }
      let intersectingTime = null;
      const observer = new IntersectionObserver(
        ([e]) => {
          if (e.isIntersecting) {
            if (intersectingTime && e.time - intersectingTime < 1e3) {
              return;
            }
            intersectingTime = e.time;
            filamentMainContent.classList.remove("is-sticky");
            return;
          }
          let offsetModifier = 0;
          if (theme === "floating") {
            offsetModifier += 8;
          }
          filamentHeader.style.top = offsetHeight + offsetModifier + "px";
          filamentHeader.setAttribute("wire:ignore", "true");
          if (colors) {
            filamentHeader.style.setProperty("--sticky-header-color-light", colors.light);
            filamentHeader.style.setProperty("--sticky-header-color-dark", colors.dark);
          }
          if (opacity) {
            filamentHeader.style.setProperty("--sticky-header-opacity", opacity);
          }
          filamentMainContent.classList.add("is-sticky");
        },
        {
          rootMargin: `-${offsetHeight}px`,
          threshold: [0]
        }
      );
      observer.observe(trigger);
    });
  }
})();
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsiLi4vanMvcGx1Z2luLmpzIl0sCiAgInNvdXJjZXNDb250ZW50IjogWyJjb25zdCBmaWxhbWVudFRvcGJhciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuZmlsYW1lbnQtbWFpbi10b3BiYXJcIik7XG5jb25zdCBmaWxhbWVudE1haW5Db250ZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5maWxhbWVudC1tYWluLWNvbnRlbnRcIik7XG5jb25zdCBmaWxhbWVudEhlYWRlciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuZmlsYW1lbnQtaGVhZGVyXCIpO1xuXG5pZiAoZmlsYW1lbnRUb3BiYXIgJiYgZmlsYW1lbnRNYWluQ29udGVudCAmJiBmaWxhbWVudEhlYWRlcikge1xuICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcihcImxvYWRcIiwgZnVuY3Rpb24gKCkge1xuICAgIGNvbnN0IHRyaWdnZXIgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiZGl2XCIpO1xuICAgIGNvbnN0IHRoZW1lID0gZmlsYW1lbnREYXRhPy5zdGlja3lJc0Zsb2F0aW5nID8/IGZhbHNlID8gJ2Zsb2F0aW5nJyA6ICdkZWZhdWx0JztcbiAgICBjb25zdCB0b3BCYXJTdGlja3kgPSBmaWxhbWVudERhdGE/LnN0aWNreVRvcEJhciA/PyB0cnVlO1xuICAgIGNvbnN0IGNvbG9ycyA9IGZpbGFtZW50RGF0YT8uc3RpY2t5Q29sb3JzO1xuICAgIGNvbnN0IG9wYWNpdHkgPSBmaWxhbWVudERhdGE/LnN0aWNreU9wYWNpdHk7XG5cbiAgICB0cmlnZ2VyLmNsYXNzTGlzdC5hZGQoXCJmaWxhbWVudC1zdGlja3ktdHJpZ2dlclwiKTtcblxuICAgIGZpbGFtZW50TWFpbkNvbnRlbnQucHJlcGVuZCh0cmlnZ2VyKTtcblxuICAgIGZpbGFtZW50TWFpbkNvbnRlbnQuY2xhc3NMaXN0LmFkZChgc3RpY2t5LXRoZW1lLSR7dGhlbWV9YCk7XG5cbiAgICBsZXQgb2Zmc2V0SGVpZ2h0ID0gZmlsYW1lbnRUb3BiYXIub2Zmc2V0SGVpZ2h0O1xuXG4gICAgaWYgKCF0b3BCYXJTdGlja3kpIHtcbiAgICAgIGZpbGFtZW50VG9wYmFyLmNsYXNzTGlzdC5yZW1vdmUoJ3N0aWNreScpO1xuICAgICAgb2Zmc2V0SGVpZ2h0ID0gMDtcbiAgICB9XG5cbiAgICBsZXQgaW50ZXJzZWN0aW5nVGltZSA9IG51bGw7XG5cbiAgICBjb25zdCBvYnNlcnZlciA9IG5ldyBJbnRlcnNlY3Rpb25PYnNlcnZlcihcbiAgICAgIChbZV0pID0+IHtcblxuICAgICAgICBpZiAoZS5pc0ludGVyc2VjdGluZykge1xuICAgICAgICAgIGlmIChpbnRlcnNlY3RpbmdUaW1lICYmIChlLnRpbWUgLSBpbnRlcnNlY3RpbmdUaW1lKSA8IDEwMDApIHtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgICB9XG4gICAgICAgICAgaW50ZXJzZWN0aW5nVGltZSA9IGUudGltZTtcbiAgICAgICAgICBmaWxhbWVudE1haW5Db250ZW50LmNsYXNzTGlzdC5yZW1vdmUoXCJpcy1zdGlja3lcIik7XG4gICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgbGV0IG9mZnNldE1vZGlmaWVyID0gMDtcblxuICAgICAgICBpZiAodGhlbWUgPT09ICdmbG9hdGluZycpIHtcbiAgICAgICAgICBvZmZzZXRNb2RpZmllciArPSA4O1xuICAgICAgICB9XG5cbiAgICAgICAgZmlsYW1lbnRIZWFkZXIuc3R5bGUudG9wID0gKG9mZnNldEhlaWdodCArIG9mZnNldE1vZGlmaWVyKSArIFwicHhcIjtcblxuICAgICAgICBmaWxhbWVudEhlYWRlci5zZXRBdHRyaWJ1dGUoXCJ3aXJlOmlnbm9yZVwiLCBcInRydWVcIik7XG5cbiAgICAgICAgaWYgKGNvbG9ycykge1xuICAgICAgICAgICAgZmlsYW1lbnRIZWFkZXIuc3R5bGUuc2V0UHJvcGVydHkoJy0tc3RpY2t5LWhlYWRlci1jb2xvci1saWdodCcsIGNvbG9ycy5saWdodCk7XG4gICAgICAgICAgICBmaWxhbWVudEhlYWRlci5zdHlsZS5zZXRQcm9wZXJ0eSgnLS1zdGlja3ktaGVhZGVyLWNvbG9yLWRhcmsnLCBjb2xvcnMuZGFyayk7XG4gICAgICAgIH1cblxuICAgICAgICBpZiAob3BhY2l0eSkge1xuICAgICAgICAgICAgZmlsYW1lbnRIZWFkZXIuc3R5bGUuc2V0UHJvcGVydHkoJy0tc3RpY2t5LWhlYWRlci1vcGFjaXR5Jywgb3BhY2l0eSk7XG4gICAgICAgIH1cblxuICAgICAgICBmaWxhbWVudE1haW5Db250ZW50LmNsYXNzTGlzdC5hZGQoXCJpcy1zdGlja3lcIik7XG4gICAgICB9LFxuICAgICAge1xuICAgICAgICByb290TWFyZ2luOiBgLSR7b2Zmc2V0SGVpZ2h0fXB4YCxcbiAgICAgICAgdGhyZXNob2xkOiBbMF0sXG4gICAgICB9XG4gICAgKTtcblxuICAgIG9ic2VydmVyLm9ic2VydmUodHJpZ2dlcik7XG4gIH0pO1xufSJdLAogICJtYXBwaW5ncyI6ICI7O0FBQUEsTUFBTSxpQkFBaUIsU0FBUyxjQUFjLHVCQUF1QjtBQUNyRSxNQUFNLHNCQUFzQixTQUFTLGNBQWMsd0JBQXdCO0FBQzNFLE1BQU0saUJBQWlCLFNBQVMsY0FBYyxrQkFBa0I7QUFFaEUsTUFBSSxrQkFBa0IsdUJBQXVCLGdCQUFnQjtBQUMzRCxXQUFPLGlCQUFpQixRQUFRLFdBQVk7QUFMOUM7QUFNSSxZQUFNLFVBQVUsU0FBUyxjQUFjLEtBQUs7QUFDNUMsWUFBTSxVQUFRLGtEQUFjLHFCQUFkLFlBQWtDLFNBQVEsYUFBYTtBQUNyRSxZQUFNLGdCQUFlLGtEQUFjLGlCQUFkLFlBQThCO0FBQ25ELFlBQU0sU0FBUyw2Q0FBYztBQUM3QixZQUFNLFVBQVUsNkNBQWM7QUFFOUIsY0FBUSxVQUFVLElBQUkseUJBQXlCO0FBRS9DLDBCQUFvQixRQUFRLE9BQU87QUFFbkMsMEJBQW9CLFVBQVUsSUFBSSxnQkFBZ0IsT0FBTztBQUV6RCxVQUFJLGVBQWUsZUFBZTtBQUVsQyxVQUFJLENBQUMsY0FBYztBQUNqQix1QkFBZSxVQUFVLE9BQU8sUUFBUTtBQUN4Qyx1QkFBZTtBQUFBLE1BQ2pCO0FBRUEsVUFBSSxtQkFBbUI7QUFFdkIsWUFBTSxXQUFXLElBQUk7QUFBQSxRQUNuQixDQUFDLENBQUMsQ0FBQyxNQUFNO0FBRVAsY0FBSSxFQUFFLGdCQUFnQjtBQUNwQixnQkFBSSxvQkFBcUIsRUFBRSxPQUFPLG1CQUFvQixLQUFNO0FBQzFEO0FBQUEsWUFDRjtBQUNBLCtCQUFtQixFQUFFO0FBQ3JCLGdDQUFvQixVQUFVLE9BQU8sV0FBVztBQUNoRDtBQUFBLFVBQ0Y7QUFFQSxjQUFJLGlCQUFpQjtBQUVyQixjQUFJLFVBQVUsWUFBWTtBQUN4Qiw4QkFBa0I7QUFBQSxVQUNwQjtBQUVBLHlCQUFlLE1BQU0sTUFBTyxlQUFlLGlCQUFrQjtBQUU3RCx5QkFBZSxhQUFhLGVBQWUsTUFBTTtBQUVqRCxjQUFJLFFBQVE7QUFDUiwyQkFBZSxNQUFNLFlBQVksK0JBQStCLE9BQU8sS0FBSztBQUM1RSwyQkFBZSxNQUFNLFlBQVksOEJBQThCLE9BQU8sSUFBSTtBQUFBLFVBQzlFO0FBRUEsY0FBSSxTQUFTO0FBQ1QsMkJBQWUsTUFBTSxZQUFZLDJCQUEyQixPQUFPO0FBQUEsVUFDdkU7QUFFQSw4QkFBb0IsVUFBVSxJQUFJLFdBQVc7QUFBQSxRQUMvQztBQUFBLFFBQ0E7QUFBQSxVQUNFLFlBQVksSUFBSTtBQUFBLFVBQ2hCLFdBQVcsQ0FBQyxDQUFDO0FBQUEsUUFDZjtBQUFBLE1BQ0Y7QUFFQSxlQUFTLFFBQVEsT0FBTztBQUFBLElBQzFCLENBQUM7QUFBQSxFQUNIOyIsCiAgIm5hbWVzIjogW10KfQo=
