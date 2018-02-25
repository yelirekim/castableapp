//
//  CAUser.m
//  Castable
//
//  Created by Mike Riley on 2/25/18.
//  Copyright © 2018 Panopsis. All rights reserved.
//

#import "CAUser.h"
#import "CAConfig.h"

@implementation CAUser

CA_SYNTHESIZE_SINGLETON(User)

- (BOOL)isAuthenticated {
    return YES;
}

- (void)authenticateUser:(CAUserAuthenticatedHandler)onAuthenticated {
    onAuthenticated();
}

- (NSString *)apiKey {
    if (_apiKey == nil) {
        _apiKey = [[CAConfig sharedConfig] apiKey];
    }
    return _apiKey;
}

@end
