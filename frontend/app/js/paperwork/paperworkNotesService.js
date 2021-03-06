paperworkModule.factory('paperworkNotesService', ['$rootScope', '$http', 'paperworkNetService', function($rootScope, $http, paperworkNetService) {
  var paperworkNotesServiceFactory = {};

  // paperworkNotesServiceFactory.selectedNoteIndex = 0;

  paperworkNotesServiceFactory.createNote = function(notebookId, data, callback) {
    paperworkNetService.apiPost('/notebooks/' + notebookId + '/notes', data, callback);
  };

  paperworkNotesServiceFactory.updateNote = function(noteId, data, callback) {
    paperworkNetService.apiPut('/notebooks/0/notes/' + noteId, data, callback);
  };

  paperworkNotesServiceFactory.deleteNote = function(noteId, callback) {
    paperworkNetService.apiDelete('/notebooks/0/notes/' + noteId, callback);
  };

  paperworkNotesServiceFactory.getNotesInNotebook = function(notebookId, callback) {
    paperworkNetService.apiGet('/notebooks/' + notebookId + '/notes', function(status, data) {
      if(status == 200) {
        $rootScope.notes = data.response;
        if(typeof callback != "undefined") {
          callback();
        }
      }
    });
  };

  paperworkNotesServiceFactory.getNotesInTag = function(tagId) {
    paperworkNetService.apiGet('/tagged/' + tagId, function(status, data) {
      if(status == 200) {
        $rootScope.notes = data.response;
      }
    });
  };

  paperworkNotesServiceFactory.getNoteById = function(noteId) {
    paperworkNetService.apiGet('/notebooks/0/notes/' + noteId, function(status, data) {
      if(status == 200) {
        $rootScope.note = data.response;
      }
    });
  };

  paperworkNotesServiceFactory.getNoteVersionAttachments = function(notebookId, noteId, versionId, callback) {
    paperworkNetService.apiGet('/notebooks/' + notebookId + '/notes/' + noteId + '/versions/' + versionId + '/attachments', function(status, data) {
      if(status == 200) {
        if(typeof callback != "undefined") {
          callback(data.response);
        }
      }
    });
  };

  return paperworkNotesServiceFactory;
}]);