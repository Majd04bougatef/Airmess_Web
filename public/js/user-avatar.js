/**
 * Default user avatar as a data URI
 */
function getDefaultAvatarDataUri() {
  return 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCI+PGNpcmNsZSBjeD0iNTAiIGN5PSI1MCIgcj0iNTAiIGZpbGw9IiNlMGUwZTAiLz48Y2lyY2xlIGN4PSI1MCIgY3k9IjQwIiByPSIxNSIgZmlsbD0iIzllOWU5ZSIvPjxwYXRoIGQ9Ik01MCw2MCBDMzUsNjAgMjUsNzUgMjUsODUgTDc1LDg1IEM3NSw3NSA2NSw2MCA1MCw2MCBaIiBmaWxsPSIjOWU5ZTllIi8+PC9zdmc+';
}

/**
 * Handle image loading errors for user avatars
 */
function handleImageError(img) {
  // First try the default.jpg in the users directory
  img.src = '/images/users/default.jpg';
  
  // If that fails, use the SVG in the images directory
  img.onerror = function() {
    img.src = '/images/user-avatar.svg';
    
    // If that also fails, use data URI as final fallback
    img.onerror = function() {
      img.src = getDefaultAvatarDataUri();
      img.onerror = null; // No more error handling needed
    };
  };
} 