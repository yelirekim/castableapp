//
//  CAUser.h
//  Castable
//
//  Created by Mike Riley on 2/25/18.
//  Copyright © 2018 Panopsis. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "CASingletons.h"

typedef void (^CAUserAuthenticatedHandler) (void);

@interface CAUser : NSObject <CASingleton> {
    NSString * _apiKey;
}

CA_DECLARE_SINGLETON(User)

- (BOOL)isAuthenticated;
- (void)authenticateUser:(CAUserAuthenticatedHandler)onAuthenticated;

@property (nonatomic, readonly) NSString * apiKey;

@end
