/**
 * Handles error for user avatar images
 * Provides a proper fallback mechanism for missing user images
 */
function handleImageError(img) {
  // Try to load the default avatar from users directory
  img.src = '/uploads/users/default.png';
  
  // If that fails, try the general user icon
  img.onerror = function() {
    img.src = '/images/user-icon.png';
    
    // If that also fails, use a data URI for a simple avatar as final fallback
    img.onerror = function() {
      img.src = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCI+PGNpcmNsZSBjeD0iNTAiIGN5PSI1MCIgcj0iNTAiIGZpbGw9IiNlMGUwZTAiLz48Y2lyY2xlIGN4PSI1MCIgY3k9IjQwIiByPSIxNSIgZmlsbD0iIzllOWU5ZSIvPjxwYXRoIGQ9Ik01MCw2MCBDMzUsNjAgMjUsNzUgMjUsODUgTDc1LDg1IEM3NSw3NSA2NSw2MCA1MCw2MCBaIiBmaWxsPSIjOWU5ZTllIi8+PC9zdmc+';
      img.onerror = null; // Prevent any further errors
    };
  };
} 