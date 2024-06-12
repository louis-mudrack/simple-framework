export class Notification {
  static queue = [];
  static isDisplaying = false;

  constructor(message, code, { persistent = false, onShow = null, onClose = null } = {}) {
      this.message = message;
      this.code = code;
      this.persistent = persistent;
      this.onShow = onShow;
      this.onClose = onClose;
      Notification.queue.push(this);
      if (!Notification.isDisplaying) {
          this.displayNext();
      }
  }

  displayNext() {
      if (Notification.queue.length > 0) {
          Notification.isDisplaying = true;
          const notification = Notification.queue.shift();
          notification.display();
      } else {
          Notification.isDisplaying = false;
      }
  }

  display() {
      const notificationElement = document.createElement('div');
      notificationElement.setAttribute('role', 'alert');
      notificationElement.setAttribute('aria-live', 'assertive');
      notificationElement.textContent = this.message;
      notificationElement.className = this.getType();
      if (!this.persistent) {
          setTimeout(() => this.close(notificationElement), 3000);
      }
      const closeButton = this.createCloseButton(notificationElement);
      notificationElement.appendChild(closeButton);
      document.body.appendChild(notificationElement);
      if (this.onShow) this.onShow();
  }

  getType() {
    const statusMap = new Map([
      // Success responses
      [200, 'notification notification-success'], // OK
      [201, 'notification notification-success'], // Created
      [202, 'notification notification-success'], // Accepted

      // Redirection messages
      [301, 'notification notification-info'], // Moved Permanently
      [302, 'notification notification-info'], // Found

      // Client error responses
      [400, 'notification notification-warning'], // Bad Request
      [401, 'notification notification-warning'], // Unauthorized
      [403, 'notification notification-warning'], // Forbidden
      [404, 'notification notification-warning'], // Not Found
      
      // Server error responses
      [500, 'notification notification-error'], // Internal Server Error
      [501, 'notification notification-error'], // Not Implemented
      [502, 'notification notification-error'], // Bad Gateway
      [503, 'notification notification-error'], // Service Unavailable
    ]);
  
    // Default to 'notification info' if the code is not found in the map
    return statusMap.get(this.code) || 'notification notification-info';
  }

  createCloseButton(notificationElement) {
      const button = document.createElement('button');
      button.textContent = '\u2715';
      button.setAttribute('aria-label', 'Close notification');
      button.onclick = () => this.close(notificationElement);
      return button;
  }

  close(notificationElement) {
      if (document.body.contains(notificationElement)) {
          document.body.removeChild(notificationElement);
          if (this.onClose) this.onClose();
          this.displayNext();
      }
  }
}

function testNotifications() {
  // Success responses
  new Notification('Success message', 200, {
    onShow: () => console.log('Success notification shown'),
    onClose: () => console.log('Success notification closed')
  });
  new Notification('Created message', 201, {
    onShow: () => console.log('Created notification shown'),
    onClose: () => console.log('Created notification closed')
  });

  // Redirection messages
  new Notification('Moved Permanently message', 301, {
    onShow: () => console.log('Moved Permanently notification shown'),
    onClose: () => console.log('Moved Permanently notification closed')
  });
  new Notification('Found message', 302, {
    onShow: () => console.log('Found notification shown'),
    onClose: () => console.log('Found notification closed')
  });

  // Client error responses
  new Notification('Bad Request message', 400, {
    onShow: () => console.log('Bad Request notification shown'),
    onClose: () => console.log('Bad Request notification closed')
  });
  new Notification('Unauthorized message', 401, {
    onShow: () => console.log('Unauthorized notification shown'),
    onClose: () => console.log('Unauthorized notification closed')
  });
  new Notification('Forbidden message', 403, {
    onShow: () => console.log('Forbidden notification shown'),
    onClose: () => console.log('Forbidden notification closed')
  });
  new Notification('Not Found message', 404, {
    onShow: () => console.log('Not Found notification shown'),
    onClose: () => console.log('Not Found notification closed')
  });

  // Server error responses
  new Notification('Internal Server Error message', 500, {
    onShow: () => console.log('Internal Server Error notification shown'),
    onClose: () => console.log('Internal Server Error notification closed')
  });
  new Notification('Not Implemented message', 501, {
    onShow: () => console.log('Not Implemented notification shown'),
    onClose: () => console.log('Not Implemented notification closed')
  });

  // Informational response
  new Notification('Continue message', 100, {
    onShow: () => console.log('Continue notification shown'),
    onClose: () => console.log('Continue notification closed')
  });

  // Persistent message (custom use-case)
  new Notification('Persistent message', 300, {
    persistent: true,
    onShow: () => console.log('Persistent notification shown'),
    onClose: () => console.log('Persistent notification closed')
  });
}

// testNotifications();
