//
//  CASingletons.m
//  Castable
//
//  Created by Mike Riley on 2/23/18.
//  Copyright © 2018 Panopsis. All rights reserved.
//

#import "CASingletons.h"
#import "CAConfig.h"

@interface CASingletons ()
@property (nonatomic, readonly) NSArray * singletons;
@end

@implementation CASingletons

- (NSArray *)applicationSingletons
{
    if(_singletons == nil) {
        _singletons = [NSArray arrayWithObjects:
                          [CAConfig sharedConfig],
                          nil];
    }
    return _singletons;
}

#define APPLICATION_SINGLETONS_VOID_PROPOGATE(method) \
- (void)method \
{ \
    for(id<CASingleton> singleton in self.singletons) { \
        if([singleton respondsToSelector:@selector(method)]) { [singleton method]; } \
    } \
}

APPLICATION_SINGLETONS_VOID_PROPOGATE(start)
APPLICATION_SINGLETONS_VOID_PROPOGATE(stop)
APPLICATION_SINGLETONS_VOID_PROPOGATE(pause)
APPLICATION_SINGLETONS_VOID_PROPOGATE(resume)

- (BOOL)handleOpenUrl:(NSURL *)url
{
    for(id<CASingleton> singleton in self.singletons) {
        if([singleton respondsToSelector:@selector(handleOpenUrl:)] && [singleton handleOpenUrl:url]) {
            return YES;
        }
    }
    return NO;
}

CA_SYNTHESIZE_SINGLETON(Singletons)

@end

